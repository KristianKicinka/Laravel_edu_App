<header class="panel-head container-fluid py-3">
    <h1>Subjects</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Subjects',
                ]) }}
            </div>
            <button class="btn btn-primary float-lg-right mr-2" data-toggle="modal" data-target="#myModal"> New Subject</button>
        </header>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h4 class="modal-title" id="myModalLabel">New Subject</h4>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    {!! Form::open(["method"=>"post", "url"=>route('subjectCreate')]) !!}
                        {{csrf_field()}}
                        <div class="modal-body">
                            {!! Form::label("subject_name_label","Subject name :") !!}
                            {!! Form::text("subject_name_val",null,['placeholder'=>"Set the name of subject",'class'=>'form-control','autofocus'=>true,"required"=>true]) !!}
                            {!! Form::label("subject_shortcut_label","Subject shortcut :") !!}
                            {!! Form::text("subject_shortcut_val",null,['placeholder'=>"Set the shortcut of subject",'class'=>'form-control','autofocus'=>true,"required"=>true, "min"=>1]) !!}
                            {!! Form::label("subject_description_label","Subject description :") !!}
                            {!! Form::textarea("subject_description_val",null,['placeholder'=>"Set the description of subject",'class'=>'form-control','autofocus'=>true,"required"=>true,]) !!}


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        {{--Content--}}

        <div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Subject ID</th>
                    <th>Name of subject</th>
                    <th>Subject shortcut</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse($subjects as $subject)

                    {{--ModalDescription--}}

                    <div class="modal fade" id="descriptionModal_{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header py-2">
                                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <form method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>{{ $subject->description }}</p>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->shortcut }}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#descriptionModal_{{$subject->id}}" >Description</button>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="4"> Nothing to display</td>
                @endforelse
                </tbody>
            </table>
            {{ $subjects->links() }}
        </div>


    </div>
</main>
