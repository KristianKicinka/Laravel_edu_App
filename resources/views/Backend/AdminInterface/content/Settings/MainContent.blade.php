<header class="panel-head container-fluid py-3">
    <h1>Nastavenia</h1>
</header>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Zmena Používateľského Mena</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("usernameEdit",Auth::id())]) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            {!! Form::label("userName_edit_lab","User name :") !!}
            {!! Form::text("userName_edit_val",Auth::user()->name,["class"=>"form-control","required"=>"true"]) !!}
            <button type="submit" class="btn btn-blue my-4" >Uložiť</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Zmeniť Email</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("emailEdit",Auth::id())]) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            {!! Form::label("userEmail_edit_lab","User email :") !!}
            {!! Form::email("userEmail_edit_val",Auth::user()->email,["class"=>"form-control","required"=>"true"]) !!}
            <button type="submit" class="btn btn-blue my-4" >Uložiť</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
    <div class="container col-4 float-left">
        <h2>Zmeniť Heslo</h2>
        <div class="form-group">
            {!! Form::open(["method"=>"post", "url"=>route("passwordEdit",Auth::id())]) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
            {!! Form::label("oldPassword_edit_lab","Staré heslo:") !!}
            {!! Form::password("oldPassword_edit_val",["class"=>"form-control","required"=>"true","placeholder"=>"Zadajte vaše staré heslo"]) !!}
            {!! Form::label("newPassword_edit_lab","Nové heslo:") !!}
            {!! Form::password("newPassword_edit_val",["class"=>"form-control","required"=>"true","placeholder"=>"Zadajte vaše nové heslo"]) !!}
            {!! Form::password("$",["class"=>"form-control my-2","required"=>"true","placeholder"=>"Znova zadajte nové heslo"]) !!}
            <button type="submit" class="btn btn-blue my-4" >Uložiť</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
