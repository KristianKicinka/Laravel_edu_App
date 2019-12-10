<header class="panel-head container-fluid py-3">
    <h1>Settings</h1>
</header>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Profile Settings</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("profileEdit",Auth::id())]) !!}
            {!! Form::label("userName_edit_lab","User name :") !!}
            {!! Form::text("userName_edit_val",Auth::user()->name,["class"=>"form-control","required"=>"true"]) !!}
            {!! Form::label("oldPassword_edit_lab","Old password :") !!}
            {!! Form::password("oldPassword_edit_val",["class"=>"form-control","required"=>"true","placeholder"=>"Enter your old Password"]) !!}
            {!! Form::label("newPassword_edit_lab","New password :") !!}
            {!! Form::password("newPassword_edit_val",["class"=>"form-control","required"=>"true","placeholder"=>"Enter your new Password"]) !!}
            {!! Form::password("newPassword2_edit_val",["class"=>"form-control my-2","required"=>"true","placeholder"=>"Repeat your new Password"]) !!}
            <button type="submit" class="btn btn-primary my-2" >Save</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
