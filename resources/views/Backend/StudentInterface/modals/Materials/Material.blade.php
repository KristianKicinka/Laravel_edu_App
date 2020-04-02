<div class="modal fade" id="materialModal_{{ $material->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Ukážka materiálu</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            {{csrf_field()}}
            <div class="modal-body" style="height: 550px">
                <iframe class="w-100 h-100" src="{!! "../public/uploads/materials".'\\'.$material->filename !!}" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
            </div>
        </div>
    </div>
</div>
