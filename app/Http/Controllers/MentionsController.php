<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Controller for the notices resources
 */
class MentionsController extends Controller
{
    /**
     * This function return a view with legal notices
     *
     * @return resource 
     */
    public function index()
    {
        // The system juste provide a view here
        return view('mentions.indexView');
    }
}
