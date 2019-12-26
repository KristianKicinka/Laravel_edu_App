<header class="panel-head container-fluid py-3">
    <h1>Settings</h1>
</header>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Change Username</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("usernameEdit",Auth::id())]) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            {!! Form::label("userName_edit_lab","User name :") !!}
            {!! Form::text("userName_edit_val",Auth::user()->name,["class"=>"form-control","required"=>"true"]) !!}
            <button type="submit" class="btn btn-blue my-4" >Save</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Change Email</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("emailEdit",Auth::id())]) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            {!! Form::label("userEmail_edit_lab","User email :") !!}
            {!! Form::email("userEmail_edit_val",Auth::user()->email,["class"=>"form-control","required"=>"true"]) !!}
            <button type="submit" class="btn btn-blue my-4" >Save</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Change Password</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("passwordEdit",Auth::id())]) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            {!! Form::label("oldPassword_edit_lab","Old password :") !!}
            {!! Form::password("oldPassword_edit_val",["class"=>"form-control","required"=>"true","placeholder"=>"Enter your old Password"]) !!}
            {!! Form::label("newPassword_edit_lab","New password :") !!}
            {!! Form::password("newPassword_edit_val",["class"=>"form-control","required"=>"true","placeholder"=>"Enter your new Password"]) !!}
            {!! Form::password("$",["class"=>"form-control my-2","required"=>"true","placeholder"=>"Repeat your new Password"]) !!}
            <button type="submit" class="btn btn-blue my-4" >Save</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
