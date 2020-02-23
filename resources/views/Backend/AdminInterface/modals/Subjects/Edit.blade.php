<div class="modal fade" id="editModal_{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Upraviť predmet</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('subjectEdit',$subject->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                {!! Form::label("subject_name_label","Názov predmetu:") !!}
                {!! Form::text("subject_name_val",$subject->name,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("subject_shortcut_label","Skratka predmetu:") !!}
                {!! Form::text("subject_shortcut_val",$subject->shortcut,['class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("subject_description_label","Popis predmetu:") !!}
                {!! Form::textarea("subject_description_val",$subject->description,['class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                <button type="submit" class="btn btn-blue" >Upraviť</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
