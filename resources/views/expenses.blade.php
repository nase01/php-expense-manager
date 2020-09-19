@extends('layouts.app_panel')

@section('content')

<div class="container-fluid">

    <div class="panellocation">
      <a href="#">Expense Management </a> / Expenses
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                <i class="fas fa-list mr-1"></i> Expenses
                </div>
                <div class="col col-4 text-right">
                    <button 
                        class="btn btn-sm btn-primary"
                        onClick="showAddExpensesModal()"
                    >
                        <i class="fas fa-plus mr-1"></i> ADD
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="expensesModal" tabindex="-1" role="dialog" aria-labelledby="expensesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="frmExpenses" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="expensesLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                  
                                <input type="hidden" name="_token" value = "{{csrf_token()}}"> <!-- Important -->
                                <input type="hidden" name="_action"  value="{{URL::to('/expenses')}}"> <!-- Important -->
                                <div class="form-group">
                                    <label for="category_id">Expense Category</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="" seleted>-- Select --</option>
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="displayName">Amount:</label>
                                    <input type="number"  step="0.01" class="form-control" id="amount" name="amount" required >
                                </div>
                                <div class="form-group">
                                    <label for="description">Entry Date:</label>
                                    <input type="date" class="form-control" id="entry_date" name="entry_date" required >
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Expense Category</th>
                            <th>Amount</th>
                            <th>Entry Date</th>
                            <th>Created At</th>
                            <th><!-- Edit --></th>
                            <th><!-- Delete --></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($expenses) > 0)
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{$expense->category_name}}</td>
                                    <td align="right">P{{number_format($expense->amount,2)}}</td>
                                    <td>{{$expense->entry_date}}</td>
                                    <td>{{$expense->created_at}}</td>
                                    <td align="right" width="50">
                                        <button 
                                            class="btn btn-sm btn-ligth"
                                            onClick="showEditExpensesModal('{{$expense->category_id}}',{{$expense->amount}},'{{$expense->entry_date}}',{{$expense->id}})"
                                        >
                                            <i class="fas fa-pen mr-1 text-success"></i>
                                        </button>
                                    </td>
                                    <td  align="right" width="50">
                                        <button 
                                            class="btn btn-sm btn-light"
                                            onClick="deleteItem('{{$expense->entry_date}} / {{$expense->category_name}} / {{$expense->amount}}',{{$expense->id}})"
                                        >
                                            <i class="fas fa-trash mr-1 text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6" align="center">No Data</td></tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
