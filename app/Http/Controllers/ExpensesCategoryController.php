<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ExpensesCategory;

class ExpensesCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = DB::select("SELECT * FROM expenses_category ORDER BY created_at DESC ");

        if(auth()->user()->role == "Administrator") {
            return view('expenses_category')->with('categories',$categories);
        } else {
            return redirect('/error401');
        }
    }

    public function create(Request $request)
    {
        if(auth()->user()->role == "Administrator") {
            //Create Category
            $category = new ExpensesCategory;
            $category->name = $request->input('displayName');
            $category->description = $request->input('description');
            $category->save();
            return redirect('/expenses/category');
        } else {
            return redirect('/error401');
        }   
    }

    public function edit(Request $request,$id)
    {
        if(auth()->user()->role == "Administrator") {
            //Update Category
            $category = ExpensesCategory::find($id);
            $category->name = $request->input('displayName');
            $category->description = $request->input('description');
            $category->save();
            return redirect('/expenses/category');
        } else {
            return redirect('/error401');
        }
        
    }

    public function delete($id)
    {
        if(auth()->user()->role == "Administrator") {
            //Delete Category
            $category = ExpensesCategory::find($id);
            $category->delete();
            return redirect('/expenses/category');
        } else {
            return redirect('/error401');
        }
        
    }
}
