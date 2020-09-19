<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Expenses;
use App\ExpensesCategory;

class ExpensesController extends Controller
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
        $categories = DB::select("SELECT * FROM expenses_category ORDER BY name ");
        $expenses = DB::select("SELECT ep.id as id, category_id, ec.name as category_name, amount, entry_date, ep.created_at as created_at FROM expenses ep 
        LEFT JOIN expenses_category ec ON ep.category_id=ec.id
        ORDER BY ec.name, entry_date");
        
        $data = [
            'categories'  => $categories,
            'expenses'  => $expenses
        ];
        
        return view('expenses')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Create Expenses
        $expense = new Expenses;
        $expense->category_id = $request->input('category_id');
        $expense->amount = $request->input('amount');
        $expense->entry_date = $request->input('entry_date');
        $expense->save();
        return redirect('/expenses');
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
        //Update Category
        $expense = Expenses::find($id);
        $expense->category_id = $request->input('category_id');
        $expense->amount = $request->input('amount');
        $expense->entry_date = $request->input('entry_date');
        $expense->save();
        return redirect('/expenses');
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
        //Delete Category
        $expense = Expenses::find($id);
        $expense->delete();
        return redirect('/expenses');
    }
}
