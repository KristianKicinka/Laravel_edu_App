<header class="content-header py-2 px-2 shadow-sm rounded border border-secondary w-100">
    <div class="forms col-sm-5 d-inline-block">
        {{Form::open(["method"=>"post", "url"=>route('tests')])}}
        {{Form::search('searchTests',null,[
        'class'=>'form-control search_everything',
        'placeholder'=>'Vyhľadať test',
        ])}}
        {{Form::submit('Hľadať',[
        'class' =>'btn btn-orange submit_button_everywhere',
        ])}}
        {{Form::close()}}
    </div>
    <button class="btn btn-blue float-lg-right mr-2" onclick="window.location='{{ route('testCreate') }}'"> Nový test</button>
</header>
