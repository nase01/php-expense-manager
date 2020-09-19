<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UsersRole;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        if(auth()->user()->role == "Administrator") {
            $roles = DB::select("SELECT * FROM users_role ORDER BY id ");
            $users = DB::select("SELECT * FROM users ORDER BY id,role ");
            
            $data = [
                'roles'  => $roles,
                'users'  => $users
            ];
            
            return view('users')->with($data);
        } else {
            return redirect('/error401');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth()->user()->role == "Administrator") {
            

            $rules = [
                'email' => 'required|unique:users|max:150'
            ];
        
            $messages  = [
                'email.unique' => 'Failed to save: Email ('.$request->input('email').') already been taken'
            ];
        
            $this->validate($request, $rules, $messages );
            
            //Create User
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role = $request->input('role');
            $user->save();
            return redirect('/users');

        } else {
            return redirect('/error401');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if(auth()->user()->role == "Administrator") {

            //Check same user email
            $sameuser = User::find($id);
            
            //Do not validate if you are editing the same user
            if($sameuser->email != $request->input('email')) {
                $rules = [
                    'email' => 'required|unique:users|max:150'
                ];
            
                $messages  = [
                    'email.unique' => 'Failed to save: Email ('.$request->input('email').') already been taken'
                ];
            
                $this->validate($request, $rules, $messages );
            }
            
            //Update User
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->save();
            return redirect('/users');

        } else {
            return redirect('/error401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(auth()->user()->role == "Administrator") {
            if($id != 1) {
                //Delete any user except the firt default user
                $role = User::find($id);
                $role->delete();
                return redirect('/users');
            } else {
                return redirect('/error401');
            }
        } else {
            return redirect('/error401');
        }
    }

}

