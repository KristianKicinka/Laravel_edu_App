<div id="aktuality">
    <h4>Aktuality</h4>

    <div class="container my-4">



        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top" id="left_controls_top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>

            </div>
            <div class="controls-top" id="right_controls_top">
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                @for($i=0;$i<count($actualities);$i=$i+3)
                    @if($i!=0)
                        <div class="carousel-item">
                    @endif

                    <!--First slide-->
                        <div class="carousel-item active">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="{!! url("../storage/app/public/actualities/".$actualities[$i]->filename) !!}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{!! $actualities[$i]->title !!} </h4>
                                            <div class="card-text">{!! $actualities[$i]->description !!}</div>
                                            <a class="btn btn-orange" style="color: white">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="{!! url("../storage/app/public/actualities/".$actualities[$i+1]->filename) !!}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{!! $actualities[$i+1]->title !!} </h4>
                                            <div class="card-text">{!! $actualities[$i+1]->description !!}</div>
                                            <a class="btn btn-orange" style="color: white">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="{!! url("../storage/app/public/actualities/".$actualities[$i+2]->filename) !!}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{!! $actualities[$i+2]->title !!} </h4>
                                            <div class="card-text">{!! $actualities[$i+2]->description !!}</div>
                                            <a class="btn btn-orange" style="color: white">Button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.First slide-->

                @endfor

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->


    </div>


</div>
</div>
