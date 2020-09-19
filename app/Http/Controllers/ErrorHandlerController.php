<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function error401()
    {
        return view('401');
    }
}
