@if(count($errors) > 0)
    @foreach ($errors->get('email') as $error)
        <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle mr-1"></i> {{$error}}
        </div>
    @endforeach
@endif

@if(Session::get('success') != "")
    <div class="alert alert-success">
    <i class="fas fa-check-circle mr-1"></i> {{Session::get('success')}}
    </div>
@endif