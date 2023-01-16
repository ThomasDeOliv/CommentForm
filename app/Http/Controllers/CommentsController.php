<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Controller for the comments resources
 */
class CommentsController extends Controller
{
    /**
     * This function return a view with all the comments
     *
     * @return resource 
     */
    public function getComments()
    {
        // Countdown the number of records in the database for the comments entity
        $dbRows = DB::table('comments')->count();

        // Requests to fetch all the comments recorded in the database
        $comments = DB::table('comments')->select('nickname', 'picture_path', 'comment', 'note', 'creation_datetime')
            ->orderBy('creation_datetime', 'desc')
            ->get()
            ->toArray();

        // Return a view to the user, filled with the previous informations provided by the database
        return view('comments.indexView')->with(array('comments' => $comments, 'dbRows' => $dbRows, 'queryError' => ''));
    }

    /**
     * This function return a view with all the comments in accordance with filters criteria applied
     *
     * @return resource 
     */
    public function getFiltredComments(Request $request)
    {
        // Countdown the number of records in the database for the comments entity
        $dbRows = DB::table('comments')->count();

        // Checking the validity of the POST query with restricted values
        if(($request['filter'] !== 'all' && $request['filter'] !== '1' && $request['filter'] !== '2' && $request['filter'] !== '3' && $request['filter'] !== '4' && $request['filter'] !== '5') 
        || ($request['variables'] !== 'notes' && $request['variables'] !== 'dates' ) 
        || ($request['sense'] !== 'asc' && $request['sense'] !== 'desc'))
        {
            // If the POST query is invalid, it just fetch all the comments recorded in the database like usual
            $comments = DB::table('comments')->select('nickname', 'picture_path', 'comment', 'note', 'creation_datetime')
            ->orderBy('creation_datetime', 'desc')
            ->get()
            ->toArray();

            // However, we return a view with an error message to the user
            return view('comments.indexView')->with(array('comments' => $comments, 'dbRows' => $dbRows, 'queryError' => 'Paramètre(s) de filtre invalide. Aucun tri n\'a été effectué.'));
        }
        else 
        {
            // If the POST query is valid
            if($request['filter'] === 'all')
            {
                // Check if the filter parameter is set to 'all'. If It is the case, the system provid a query without a SQL WHERE clause
                $comments = DB::table('comments')->select('nickname', 'picture_path', 'comment', 'note', 'creation_datetime')
                ->orderBy($request['variables'] === 'dates' ? 'creation_datetime' : 'note', $request['sense'] === 'desc' ? 'desc' : 'asc') // Some more filters are applied on the ORDER BY command
                ->get()
                ->toArray();

                // Then, It return a view filled with all filtred comments and the number of records
                return view('comments.indexView')->with(array('comments' => $comments, 'dbRows' => $dbRows, 'queryError' => ''));
            }
            else
            {
                // Else, the system provide a query with a SQL WHERE clause on the note COLUMN
                $comments = DB::table('comments')->select('nickname', 'picture_path', 'comment', 'note', 'creation_datetime')
                ->where('note', '=', $request['filter'])
                ->orderBy('creation_datetime', $request['sense'] === 'desc' ? 'desc' : 'asc') // Some more filters are applied on the ORDER BY command. Here by default, because the WHERE statement is on the note COLUMN, the only parameter left for ordering is the creation_datetime
                ->get()
                ->toArray();

                // Then, It return a view filled with all filtred comments and the number of records
                return view('comments.indexView')->with(array('comments' => $comments, 'dbRows' => $dbRows, 'queryError' => ''));
            }
        }
    }
}
