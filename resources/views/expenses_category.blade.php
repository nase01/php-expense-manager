@extends('layouts.app_panel')

@section('content')

<div class="container-fluid">

    <div class="panellocation">
      <a href="#">Expense Management </a> / Expense Categories 
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                <i class="fas fa-list mr-1"></i> Expense Categories
                </div>
                <div class="col col-4 text-right">
                    <button 
                        class="btn btn-sm btn-primary"
                        onClick="showAddCategoryModal()"
                    >
                        <i class="fas fa-plus mr-1"></i> ADD
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="expenseCategoryModal" tabindex="-1" role="dialog" aria-labelledby="expenseCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="frmExpenseCategory" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="expenseCategoryLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                  
                                <input type="hidden" name="_token" value = "{{csrf_token()}}"> <!-- Important -->
                                <input type="hidden" name="_action"  value="{{URL::to('/expenses/category/')}}"> <!-- Important -->
                                
                                <div class="form-group">
                                    <label for="displayName">Display Name:</label>
                                    <input type="text" class="form-control" id="displayName" name="displayName" required >
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" id="description" name="description" required >
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
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th><!-- Edit --></th>
                            <th><!-- Delete --></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($categories) > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td align="right" width="50">
                                        <button 
                                            class="btn btn-sm btn-ligth"
                                            onClick="showEditCategoryModal('{{$category->name}}','{{$category->description}}',{{$category->id}})"
                                        >
                                            <i class="fas fa-pen mr-1 text-success"></i>
                                        </button>
                                    </td>
                                    <td  align="right" width="50">
                                        <button 
                                            class="btn btn-sm btn-light"
                                            onClick="deleteItem('{{$category->name}}',{{$category->id}})"
                                        >
                                            <i class="fas fa-trash mr-1 text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5" align="center">No Data</td></tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
