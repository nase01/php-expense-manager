<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users_changepass')->with('success','');
    }

    public function edit(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/changepass')->with('success','Password successfully updated');
    }
}
