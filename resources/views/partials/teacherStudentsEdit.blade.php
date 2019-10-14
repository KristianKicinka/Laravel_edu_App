<div class="modal fade" id="editModal_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Edit Subject</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('studentsEdit',$subject->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
               {!! Form::label("student_name_lab","Student name :") !!}
               {!! Form::text("student_name_val",$student->name,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
               {!! Form::label("student_name_lab","Student name :") !!}
               {!! Form::text("student_name_val",$student->name,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Edit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
