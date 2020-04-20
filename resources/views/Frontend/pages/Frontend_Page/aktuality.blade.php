<div id="aktuality">
    <h4>Aktuality</h4>

    @foreach($actualities as $actuality)
        @include("Frontend.pages.Frontend_Page.actuality_modal")
    @endforeach


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
                @for($i=0;$i<count($actualities)/3;$i=$i+1)
                    @if($i==0)
                        <li data-target="#multi-item-example" data-slide-to="{{ $i }}" class="active"></li>
                    @else
                        <li data-target="#multi-item-example" data-slide-to="{{ $i }}"></li>
                    @endif
                @endfor
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                {{--{{ dd($actualities) }}--}}
                @for($i=0;$i<count($actualities);$i=$i+3)
                    @if($i!=0)
                        <div class="carousel-item">
                    @else
                                <div class="carousel-item active">
                    @endif

                    <!--First slide-->
                        @if(($i)<=count($actualities)-1)
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="{!! url("../public/uploads/actualities/".$actualities[$i]->filename) !!}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title ml-1">{!! $actualities[$i]->title !!} </h4>
                                            <div class="card-text">{!! Str::words($actualities[$i]->description,5,"...") !!}</div>
                                            <button class="btn btn-orange" style="color: white" data-toggle="modal" data-target="#descriptionModal_{{$actualities[$i]->id}}">Čítaj viac</button>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(($i+1)<count($actualities))
                                    <div class="col-md-4 clearfix d-none d-md-block">
                                        <div class="card mb-2">
                                            <img class="card-img-top" src="{!! url("../public/uploads/actualities/".$actualities[$i+1]->filename) !!}"
                                                 alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title ml-1">{!! $actualities[$i+1]->title !!} </h4>
                                                <div class="card-text">{!! Str::words($actualities[$i+1]->description,5,"...") !!}</div>
                                                <button class="btn btn-orange" style="color: white" data-toggle="modal" data-target="#descriptionModal_{{$actualities[$i+1]->id}}">Čítaj viac</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(($i+2)<=count($actualities))
                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="{!! url("../public/uploads/actualities/".$actualities[$i+2]->filename) !!}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title ml-1">{!! $actualities[$i+2]->title !!} </h4>
                                            <div class="card-text">{!! Str::words($actualities[$i+2]->description,5,"...") !!}</div>
                                            <button class="btn btn-orange" style="color: white" data-toggle="modal" data-target="#descriptionModal_{{$actualities[$i+2]->id}}">Čítaj viac</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
