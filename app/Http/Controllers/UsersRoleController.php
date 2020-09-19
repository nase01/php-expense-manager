<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UsersRole;

class UsersRoleController extends Controller
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
            $roles = DB::select("SELECT * FROM users_role ORDER BY id");
            return view('users_role')->with('roles',$roles);
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
            
            $roleExist = UsersRole::where('name', '=', $request->input('displayName'))->first();
            
            //Check if not exist
            if ($roleExist === null) {
                //Create Role
                $role = new UsersRole;
                $role->name = $request->input('displayName');
                $role->description = $request->input('description');
                $role->save();
            }
            return redirect('/users/role');
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
    public function edit(Request $request, $id)
    {
        if(auth()->user()->role == "Administrator") {
            //Update Role
            $role = UsersRole::find($id);
            $role->name = $request->input('displayName');
            $role->description = $request->input('description');
            $role->save();
            return redirect('/users/role');
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
            //Delete Role
            $role = UsersRole::find($id);
            $role->delete();
            return redirect('/users/role');
        } else {
            return redirect('/error401');
        }
        
    }
}
