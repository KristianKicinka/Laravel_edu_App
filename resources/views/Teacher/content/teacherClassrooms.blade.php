<header class="panel-head container-fluid py-3">
    <h1>Classrooms</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Classrooms',
                ]) }}
            </div>
            <button class="btn btn-primary float-lg-right mr-2" type="button"  data-toggle="modal" data-target="#myModal"> New Classroom</button>
        </header>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h4 class="modal-title" id="myModalLabel">New Class</h4>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <form method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            {!! Form::label("class_name_label","Class name :") !!}
                            {!! Form::text("class_name_val",null,['placeholder'=>"Set the name of class",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                            {!! Form::label("class_count_label","Students in class :") !!}
                            {!! Form::number("class_count_val",null,['placeholder'=>"Set the count of students in class",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                            {!! Form::label("class_type_label","Subject :") !!}
                            <div class="py-2">
                                <select class="js-example-templating form-control"style="width: 80%" name="states[]">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {!! Form::label("class_type_label","Students :") !!}
                            <div class="py-2">
                                <select class="js-example-placeholder-multiple js-states form-control"style="width: 80%" name="states[]" multiple="multiple">
                                  @foreach($users as $user)
                                  <option value="{{ $user->name }}">{{ $user->name }}</option>
                                  @endforeach
                                </select>
                            </div>

                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</main>
