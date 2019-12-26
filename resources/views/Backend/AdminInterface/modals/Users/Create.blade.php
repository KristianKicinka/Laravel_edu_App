<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Create User</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('userCreate')]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                {!! Form::label("student_name_lab","Users") !!}
                {!! Form::text("student_name_val",null,['placeholder'=>'User name','class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("student_email_lab","Email") !!}
                {!! Form::text("student_email_val",null,['placeholder'=>'Email','class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("student_password_lab","Password") !!}
                {!! Form::password("student_password_val",['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                <div class="py-2">
                    {!! Form::label("student_admin_lab","Is admin") !!}
                    {!! Form::checkbox("student_admin_val",null,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                    <br>
                    {!! Form::label("student_teacher_lab","Is teacher") !!}
                    {!! Form::checkbox("student_admin_val",null,['class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
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
