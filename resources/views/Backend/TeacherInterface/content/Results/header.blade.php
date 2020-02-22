<header class="content-header py-2 px-2 shadow-sm rounded border border-secondary w-100">
    <div class="forms col-sm-5 d-inline-block">
        {{Form::open(["method"=>"post", "url"=>route('results')])}}
        {{Form::search('searchResults',null,[
        'class'=>'form-control search_everything',
        'placeholder'=>'Vyhľadať výsledok',
        ])}}
        {{Form::submit('Hľadať',[
        'class' =>'btn btn-orange submit_button_everywhere',
        ])}}
        {{Form::close()}}
    </div>

</header>
