<div class="modal fade" id="descriptionModal_{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Popis</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

                {{csrf_field()}}
                <div class="modal-body">
                    <p>{{ $subject->description }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                </div>
        </div>
    </div>
</div>
