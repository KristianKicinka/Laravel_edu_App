<div class="modal fade" id="editModal_{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Edit Subject</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('subjectEdit',$subject->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                {!! Form::label("subject_name_label","Subjects") !!}
                {!! Form::text("subject_name_val",$subject->name,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("subject_shortcut_label","Subject shortcut :") !!}
                {!! Form::text("subject_shortcut_val",$subject->shortcut,['class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("subject_description_label","Subject description :") !!}
                {!! Form::textarea("subject_description_val",$subject->description,['class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Edit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
