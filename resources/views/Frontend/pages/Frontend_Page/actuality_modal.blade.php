<div class="modal fade" id="descriptionModal_{{ $actuality->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">

                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            {{csrf_field()}}
            <div class="modal-body">
                <img class="w-100" src="{!! url("../storage/app/public/actualities/".$actuality->filename) !!}"  alt="">
                <br>
                <h4 class="modal-title ml-1" id="myModalLabel">{{ $actuality->title }}</h4>
                <p>{!!  $actuality->description  !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
