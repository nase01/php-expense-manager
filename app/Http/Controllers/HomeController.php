<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expenses = DB::select("SELECT 
            ec.name as categoryName, 
            sum(amount) as totalAmount 
        FROM expenses ep 
        LEFT JOIN expenses_category ec ON ep.category_id=ec.id 
        GROUP BY ec.name 
        ORDER BY ec.name");

        

        return view('home')->with('expenses',$expenses);
        /*
        if(auth()->user()->role == "Administrator") {
            return view('home')->with('expenses',$expenses);
        } else {
            return "Access denied";
        }
        */
    }
}
