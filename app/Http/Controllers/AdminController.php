<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.index', ['Hello' => 'Hello World']);
    }

}