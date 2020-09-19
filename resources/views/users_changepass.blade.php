@extends('layouts.app_panel')

@section('content')

<div class="container-fluid">

    <div class="panellocation">
      Change Password
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-eye mr-1"></i> Change Password
        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="col">
                    <form id="frmUsers" action="{{URL::to('/changepass')}}" method="post">
                        <input type="hidden" name="_token" value = "{{csrf_token()}}"> <!-- Important -->
                        
                        <div class="form-group">
                            <label for="password">New Password:</label>
                            <input type="password" class="form-control" id="password" name="password" autofocus required >
                        </div>
                        <div class="form-group">
                            <label for="rtpassword">Confirm New Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required >
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form><br><br>
                    @include('inc/alert-message')
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
