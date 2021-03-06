<header class="content-header py-2 px-2 shadow-sm rounded border border-secondary w-100">
    <div class="forms col-sm-5 d-inline-block">
        {{Form::open(["method"=>"post", "url"=>route('materialsStudent')])}}
        {{Form::search('searchMaterialsStudent',null,[
        'class'=>'form-control search_everything',
        'placeholder'=>'Vyhľadať materiál',
        ])}}
        {{Form::submit('Hľadať',[
        'class' =>'btn btn-orange submit_button_everywhere',
        ])}}
        {{Form::close()}}
    </div>
    @if(Auth::user()->is_teacher==1)
    <button class="btn btn-blue float-lg-right mr-2" data-toggle="modal" data-target="#myModal"> Nový materiál</button>
    @endif
</header>
