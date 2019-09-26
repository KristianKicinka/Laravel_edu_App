<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">New Subject</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            {!! Form::open(["method"=>"post", "url"=>route('subjectCreate')]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                {!! Form::label("subject_name_label","Subject name :") !!}
                {!! Form::text("subject_name_val",null,['placeholder'=>"Set the name of subject",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("subject_shortcut_label","Subject shortcut :") !!}
                {!! Form::text("subject_shortcut_val",null,['placeholder'=>"Set the shortcut of subject",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("subject_description_label","Subject description :") !!}
                {!! Form::textarea("subject_description_val",null,['placeholder'=>"Set the description of subject",'class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>