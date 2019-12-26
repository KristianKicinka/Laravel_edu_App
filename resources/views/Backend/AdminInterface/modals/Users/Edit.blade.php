<div class="modal fade" id="editModal_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('userEdit',$user->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
               {!! Form::label("student_name_lab","Users") !!}
               {!! Form::text("student_name_val",$user->name,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("student_email_lab","Email") !!}
                {!! Form::text("student_email_val",$user->email,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("student_password_lab","Password") !!}
                {!! Form::password("student_password_val",['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
               <div class="py-2">
                   {!! Form::label("student_admin_lab","Is admin") !!}
                   {!! Form::checkbox("student_admin_val",$user->is_admin,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                   <br>
                   {!! Form::label("student_teacher_lab","Is teacher") !!}
                   {!! Form::checkbox("student_admin_val",$user->is_teacher,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-blue" >Edit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
