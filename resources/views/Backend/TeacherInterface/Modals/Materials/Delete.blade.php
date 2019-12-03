<div class="modal fade" id="deleteModal_{{ $material->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Delete Material</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('subjectDelete',$material->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                <p>Are you sure want to delete this item ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #3490dc;border-color: #3490dc">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
