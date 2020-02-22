<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Nový materiál</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            {!! Form::open(["method"=>"post", "url"=>route('materialCreate'), "enctype"=>"multipart/form-data"]) !!}
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
                    {!! Form::label("material_name_label","Názov materiálu: ") !!}
                    {!! Form::text("material_name_val",null,['placeholder'=>"Zadajte názov materiálu",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                    {!! Form::label("material_content_label","Popis materiálu / materiál: ") !!}
                    {!! Form::textarea("material_content_val",null,['placeholder'=>"Zadajte materiál alebo len jeho popis",'class'=>'form-control','autofocus'=>true,"required"=>true,"id"=>"SummerText"]) !!}
                    {{--{!! Form::label("material_file_label","Choose extern file: ") !!}--}}
                    {!! Form::label("material_subject_label","Vybrať predmet: ") !!}
                    <br>
                    <select class="js-example-templating js-states form-control py-4 w-50" name="subjectsArray" >
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {!! Form::label("material_class_label","Vybrať kurz: ") !!}
                    <br>
                    <select class="js-example-templating js-states form-control py-4 w-50" name="coursesArray" >
                        @foreach($courses as $course)
                            <option value="{{ $course->name }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    <div class="py-2 px-2">
                        {!! Form::file("material_file_val",['placeholder'=>"Vložiť súbor",'autofocus'=>true,"required"=>true,"accept"=>".pdf"]) !!}
                    </div>
                    {!! Form::hidden("material_author_val",Auth::user()->name,["type"=>"hidden"]) !!}



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                    <button type="submit" class="btn btn-blue">Vytvoriť</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
