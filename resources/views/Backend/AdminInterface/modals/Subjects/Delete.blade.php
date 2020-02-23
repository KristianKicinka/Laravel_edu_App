<div class="modal fade" id="deleteModal_{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Vymazať predmet</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            {!! Form::open(["method"=>"post", "url"=>route('subjectDelete',$subject->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                <p>Ste si istý, že chcete vymazať tento predmet ?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue">Vymazať</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>

            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
