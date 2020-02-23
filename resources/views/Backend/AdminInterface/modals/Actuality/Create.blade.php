<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Nové Aktuality</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            {!! Form::open(["method"=>"post", "url"=>route('actualityCreate'),"enctype"=>"multipart/form-data"]) !!}
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
                {!! Form::label("actuality_title_label","Názov Aktuality:") !!}
                {!! Form::text("actuality_title_val",null,['placeholder'=>"Zadajte názov aktuality",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}

                {!! Form::label("actuality_description_label","Aktuality") !!}
                {!! Form::textarea("actuality_description_val",null,['placeholder'=>"Set the description of actuality",'class'=>'form-control','autofocus'=>true,"required"=>true,"id"=>"SummerText"]) !!}
                <div class="py-2 px-2">
                    {!! Form::file("actuality_image_val",['placeholder'=>"Choose Image",'autofocus'=>true,"required"=>true,"accept"=>"image/*"]) !!}
                </div>
                {!! Form::hidden("actuality_author_val",Auth::user()->name,["type"=>"hidden"]) !!}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                <button type="submit" class="btn btn-blue">Vytvoriť</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
