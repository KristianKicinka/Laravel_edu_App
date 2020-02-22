<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Nový kurz</h4>
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
                {!! Form::label("class_name_label","Názov kurzu:") !!}
                {!! Form::text("class_name_val",null,['placeholder'=>"Zadajte názov kurzu",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("class_count_label","Študenti v triede:") !!}
                {!! Form::number("class_count_val",null,['placeholder'=>"Zadajte počet študentov v kurze",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("class_type_label","Predmet:") !!}
                <div class="py-2">
                    <select class="js-example-templating form-control"style="width: 80%" name="subjectsArray[]">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                {!! Form::label("class_type_label","Študenti:") !!}
                <div class="py-2">
                    <select class="js-example-placeholder-multiple js-states form-control"style="width: 80%" name="studentsArray[]" multiple="multiple">
                        @foreach($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                <button type="submit" class="btn btn-blue">Vytvoriť</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
