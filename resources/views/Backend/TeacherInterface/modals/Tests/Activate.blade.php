<div class="modal fade" id="activateModal_{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h4 class="modal-title" id="myModalLabel">Aktivovanie testu</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            {{csrf_field()}}
            {!! Form::open(["method"=>"post", "url"=>route('testActivate',$test->id)]) !!}
            {{csrf_field()}}
            <div class="modal-body">
                {!! Form::label("duration_label","Časový limit:") !!}
                {!! Form::number("duration_val",null,['placeholder'=>"Nastavte časový limit testu v minutách",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                {!! Form::label("percentage_label","Minimálny počet percent:") !!}
                {!! Form::number("percentage_val",null,['placeholder'=>"Nastavte minimálny počet percent pre úspešné zvládnutie testu",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                {!! Form::label("expiration_label","Expirácia:") !!}
                {!! Form::datetimeLocal("expiration_val",null,['placeholder'=>"Nastavte čas a dátum do kedy má byť test dostupný",'class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}
                {!! Form::label("for_label","Povoliť test pre kurzy:") !!}
                <div class="py-2">
                    <select class="js-example-placeholder-multiple js-states form-control"style="width: 80%" name="coursesArray[]" multiple="multiple">
                        @foreach($courses as $course)
                            <option value="{{ $course->name }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvoriť</button>
                <button type="submit" class="btn btn-blue">Aktivovať</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
