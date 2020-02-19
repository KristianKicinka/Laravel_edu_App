<header class="content-header py-2 px-2 shadow-sm rounded border border-secondary w-100">
    <div class="forms col-sm-5 d-inline-block">
        {{Form::open(["method"=>"post", "url"=>route('students')])}}
        {{Form::search('searchStudents',null,[
        'class'=>'form-control search_everything',
        'placeholder'=>'Search Students',
        ])}}
        {{Form::submit('Search',[
        'class' =>'btn btn-orange submit_button_everywhere',
        ])}}
        {{Form::close()}}
    </div>
</header>
