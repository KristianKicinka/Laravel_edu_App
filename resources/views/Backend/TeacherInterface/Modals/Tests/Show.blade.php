<div class="modal fade" id="showModal_{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Test Details</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            {{csrf_field()}}
            <div class="modal-body">
                @foreach($questions as $question)
                <h3>{{ $question->question }}</h3>
                    @foreach($answers as $answer)
                        @if($answer->is_correct == 1)
                            <p class="text-success py-2">{{ $answer->answer }}</p>
                        @endif
                            <p class="py-2">{{ $answer->answer }}</p>
                    @endforeach
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
