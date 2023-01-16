<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Person;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Controller for processing the form
 */
class HomeController extends Controller
{
    use ValidatesRequests;

    /**
     * This function return a view with a form to submit a comment
     *
     * @return resource 
     */
    public function index()
    {
        // The system just provide a view with a form here
        return view('home.indexView');
    }

    /**
     * This function register the comment and, if necessary, the visitor mail who submit the comment
     *
     * @return resource 
     */
    public function postDatas(Request $request)
    {
        try {

            // First, the system must check the validity of the informations provided by the user
            $this->validate($request, [
                'nickname' => 'required|max:50|string|regex:/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-].{1,50}$/i',
                'email' => 'required|max:320|email',
                'note' => 'required|numeric',
                'comment' => 'required|max:1000|string',
                'picture' => 'required|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:8192'
            ]);

            // After these verfications, if it is not yet registred inside the database, the system create a Person object based on the model class Person with the provided mail
            $user = Person::firstOrCreate(['email' => $request->email]);
            $user->save();

            // Then, the system register the picture provided by the user inside the storage of the Application
            $file = $request->file('picture');
            $fileName = $file->hashName();
            $file->storeAs('public/profile', $fileName);

            // Then, the system register the comment in the database
            $newComment = Comment::create([
                'nickname' => $request->nickname,
                'creation_datetime' => now(),
                'comment' => $request->comment,
                'note' => $request->note,
                'picture_path' => $fileName,
                'person_id' => $user->id
            ]);
            $newComment->save();

        } catch (Exception) {

            // Just in case of errors, a message could be provided to the user, to warn her/him of the fail of the recording
            return redirect()->route('home.index')->with('errorCode', true);
        }

        // Redirection of the user to the page of comments in case of success
        return redirect()->route('comments.getComments');
    }
}
