<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Nový newsletter</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            {!! Form::open(["method"=>"post", "url"=>route('sendNewsletterPdf'), "enctype"=>"multipart/form-data"]) !!}
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
                {!! Form::label("material_name_label","Názov newslettera: ") !!}
                {!! Form::text("newsletter_title_val",null,['placeholder'=>"Zadajte názov",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}

                <div class="py-2 px-2">
                    {!! Form::file("pdf_file_val",['placeholder'=>"Vložiť súbor",'autofocus'=>true,"required"=>true,"accept"=>".pdf"]) !!}
                </div>
                {!! Form::hidden("material_author_val",Auth::user()->name,["type"=>"hidden"]) !!}



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                <button type="submit" class="btn btn-blue">Odoslať</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
