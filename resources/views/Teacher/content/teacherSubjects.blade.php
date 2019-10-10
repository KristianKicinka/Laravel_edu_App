<header class="panel-head container-fluid py-3">
    <h1>Subjects</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        @include("partials.teacherSubjectHeader")
        <!-- Modal Create-->
        @include("partials.teacherSubjectCreate")

        {{--Content--}}

            @foreach($subjects as $subject)
                <!-- Modal Editing -->
                    @include("partials.teacherSubjectEdit")
                    {{--ModalDescription--}}
                    @include("partials.teacherSubjectDescription")
            @endforeach

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




                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->shortcut }}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#descriptionModal_{{$subject->id}}" >Description</button>
                            <button class="btn btn-success" data-toggle="modal" data-target="#editModal_{{$subject->id}}" >Edit</button>
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
