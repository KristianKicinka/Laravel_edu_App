<div class="modal fade" id="imageModal_{{ $actuality->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Obrázok</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

                {{csrf_field()}}
                <div class="modal-body">
                    <img src="{{ url("../storage/app/public/actualities/".$actuality->filename) }}" alt="" class="w-100">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                </div>
        </div>
    </div>
</div>
