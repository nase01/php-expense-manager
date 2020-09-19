@extends('layouts.app_panel')

@section('content')

<div class="container-fluid">

    <div class="panellocation">
      Dashboard
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-book-open mr-1"></i> My Expenses
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="table-responsive">
                        <table id="tblExpenses" class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Expense Categories</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($expenses) > 0)
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{$expense->categoryName}}</td>
                                            <td align="right">P{{number_format($expense->totalAmount,2)}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="2" align="center">No Data <br> Go to Expense Management to create category and expenses</td></tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <canvas id="myPieChart" width="100%" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
