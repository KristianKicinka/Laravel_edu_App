<div class="modal fade" id="activateModal_{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Test Activate</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            {{csrf_field()}}
            {!! Form::open(["method"=>"post", "url"=>route('subjectCreate')]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                {!! Form::label("duration_label","Set duration:") !!}
                {!! Form::time("duration_lable",null,['placeholder'=>"Set the time limit of the test",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("percentage_label","Set minimal percentage :") !!}
                {!! Form::number("percentage_val",null,['placeholder'=>"Set minimal percentage to pass the test",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("expiration_label","Set the expiration of test :") !!}
                {!! Form::datetimeLocal("expiration_val",null,['placeholder'=>"Set when the test expire",'class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
