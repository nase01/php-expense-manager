@extends('layouts.app_panel')

@section('content')

<div class="container-fluid">

    <div class="panellocation">
      <a href="#">User Management </a> / Users
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                <i class="fas fa-users mr-1"></i> Users
                </div>
                <div class="col col-4 text-right">
                    <button 
                        class="btn btn-sm btn-primary"
                        onClick="showAddUsersModal()"
                    >
                        <i class="fas fa-plus mr-1"></i> ADD
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="frmUsers" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="usersLabel">Add Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                  
                                <input type="hidden" name="_token" value = "{{csrf_token()}}"> <!-- Important -->
                                <input type="hidden" name="_action"  value="{{URL::to('/users')}}"> <!-- Important -->
                                
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required >
                                </div>
                                <div class="form-group">
                                    <label for="description">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required >
                                </div>
                                <div class="row" id="passwordContainer">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" required >
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="rtpassword">Confirm Password:</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="" seleted>-- Select --</option>
                                        @if(count($roles) > 0)
                                            @foreach ($roles as $role)
                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
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
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th><!-- Edit --></th>
                            <th><!-- Delete --></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if(count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td align="right" width="50">

                                        @if($user->id != 1)
                                            <button 
                                                class="btn btn-sm btn-ligth"
                                                onClick="showEditUsersModal('{{$user->name}}','{{$user->email}}','{{$user->role}}',{{$user->id}})"
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

                                        @if($user->id != 1)
                                            <button 
                                                class="btn btn-sm btn-light"
                                                onClick="deleteItem('{{$user->name}}',{{$user->id}})"
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
                            <tr><td colspan="6" align="center">No Data</td></tr>
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
