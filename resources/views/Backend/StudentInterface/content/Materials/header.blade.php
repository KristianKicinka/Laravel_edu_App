<header class="content-header py-2 px-2 shadow-sm rounded border border-secondary w-100">
    <div class="forms col-sm-5 d-inline-block">
        {{ Form::search('search',null,[
        'class'=>'form-control',
        'placeholder'=>'Vyhľadať materiál',
        ]) }}
    </div>
    @if(Auth::user()->is_teacher==1)
    <button class="btn btn-blue float-lg-right mr-2" data-toggle="modal" data-target="#myModal"> Nový materiál</button>
    @endif
</header>
