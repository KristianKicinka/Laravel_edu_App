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
                {!! Form::label("user_name_lab","Users :") !!}
                {!! Form::text("user_name_val",null,['placeholder'=>'Set user name','class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("user_email_lab","Email :") !!}
                {!! Form::text("user_email_val",null,['placeholder'=>'Set email address','class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("user_password_lab","Password :") !!}
                {!! Form::password("user_password_val",['placeholder'=>'Set password','class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                <div class="py-2">
                    {!! Form::label("user_admin_lab","Is admin") !!}
                    {!! Form::hidden("user_admin_val",0,['class'=>'px-2','autofocus'=>true,"required"=>true]) !!}
                    {!! Form::checkbox("user_admin_val",1,false,['class'=>'px-2','autofocus'=>true,]) !!}

                    <br>
                    {!! Form::label("user_teacher_lab","Is teacher") !!}
                    {!! Form::hidden("user_teacher_val",0,['class'=>'px-2','autofocus'=>true,"required"=>true]) !!}
                    {!! Form::checkbox("user_teacher_val",1,false,['class'=>'px-2','autofocus'=>true]) !!}

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-blue" >Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
