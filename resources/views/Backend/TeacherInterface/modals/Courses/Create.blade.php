<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">New Class</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            {!! Form::open(["method"=>"post", "url"=>route('classroomCreate')]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::label("class_name_label","Class name :") !!}
                {!! Form::text("class_name_val",null,['placeholder'=>"Set the name of class",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("class_count_label","Users in class :") !!}
                {!! Form::number("class_count_val",null,['placeholder'=>"Set the count of students in class",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("class_type_label","Subject :") !!}
                <div class="py-2">
                    <select class="js-example-templating form-control"style="width: 80%" name="subjectsArray[]">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                {!! Form::label("class_type_label","Users :") !!}
                <div class="py-2">
                    <select class="js-example-placeholder-multiple js-states form-control"style="width: 80%" name="studentsArray[]" multiple="multiple">
                        @foreach($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-blue">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
