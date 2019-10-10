<div class="modal fade" id="deleteModal_{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Delete Subject</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('subjectDelete',$subject->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                <p>Are you sure want to delete this item ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" style="background-color: rgba(169,5,1,1);border-color: rgba(169,5,1,1)">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
