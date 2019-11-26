<header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
    <div class="forms col-sm-5 d-inline-block">
        {{ Form::search('search',null,[
        'class'=>'form-control',
        'placeholder'=>'Search Classrooms',
        ]) }}
    </div>
    <button class="btn btn-primary float-lg-right mr-2" type="button"  data-toggle="modal" data-target="#myModal"> New Classroom</button>
</header>
