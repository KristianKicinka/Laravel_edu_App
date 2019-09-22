<header class="panel-head container-fluid py-3">
    <h1>Materials</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Materials',
                ]) }}
            </div>
            <button class="btn btn-primary float-lg-right mr-2" data-toggle="modal" data-target="#myModal"> New Material</button>
        </header>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h4 class="modal-title" id="myModalLabel">New Material</h4>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <form method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            {!! Form::label("material_name_label","Material name: ") !!}
                            {!! Form::text("material_name_val",null,['placeholder'=>"Set the name of material",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</main>
