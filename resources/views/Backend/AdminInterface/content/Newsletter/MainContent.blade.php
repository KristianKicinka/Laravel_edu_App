<header class="panel-head container-fluid py-3">
    <h1>Newsletter</h1>
</header>

<main class="panel-main-content">

    <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
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

            {!! Form::label("subject_description_label","Popis") !!}
            {!! Form::textarea("newsletter_description_val",null,['placeholder'=>"Zadajte popis predmetu",'class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}

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
</main>
