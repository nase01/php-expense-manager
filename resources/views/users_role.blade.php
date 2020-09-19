@extends('layouts.app_panel')

@section('content')

<div class="container-fluid">

    <div class="panellocation">
      <a href="#">User Management </a> / Roles 
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                <i class="fas fa-list mr-1"></i> Users Role
                </div>
                <div class="col col-4 text-right">
                    <button 
                        class="btn btn-sm btn-primary"
                        onClick="showAddUsersRoleModal()"
                    >
                        <i class="fas fa-plus mr-1"></i> ADD
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="usersRoleModal" tabindex="-1" role="dialog" aria-labelledby="usersRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="frmUsersRole" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="usersRoleLabel">Add Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                  
                                <input type="hidden" name="_token" value = "{{csrf_token()}}"> <!-- Important -->
                                <input type="hidden" name="_action"  value="{{URL::to('/users/role/')}}"> <!-- Important -->
                                
                                <div class="form-group">
                                    <label for="displayName">Display Name:</label>
                                    <input type="text" class="form-control" id="displayName" name="displayName" required >
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required >Can add expenses</textarea>                                
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
            @include('inc/alert-message')
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
                        @if(count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td style="white-space: pre-wrap;">{!!$role->description!!}</td>
                                    <td>{{$role->created_at}}</td>
                                    <td align="right" width="50">
                                        @if($role->name != "Administrator")
                                            <button 
                                                class="btn btn-sm btn-light"
                                                onClick="showEditUsersRoleModal('{{$role->name}}','{{$role->description}}',{{$role->id}})"
                                            >
                                        @else
                                            <button 
                                                class="btn btn-sm btn-light"
                                                disabled
                                            >
                                        @endif
                                            <i class="fas fa-pen mr-1 text-success"></i>
                                        </button>
                                    </td>
                                    <td  align="right" width="50">
                                        @if($role->name != "Administrator")
                                            <button 
                                                class="btn btn-sm btn-light"
                                                onClick="deleteItem('{{$role->name}}',{{$role->id}})"
                                            >
                                        @else
                                            <button 
                                                class="btn btn-sm btn-light"
                                                disabled
                                            >
                                        @endif
                                        
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
