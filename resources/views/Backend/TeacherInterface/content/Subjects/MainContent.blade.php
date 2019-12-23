<header class="panel-head container-fluid py-3">
    <h1>Subjects</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
        @include("Backend.TeacherInterface.content.Subjects.header")
        <!-- Modal Create-->
        @include("Backend.TeacherInterface.Modals.Subjects.Create")

        {{--Content--}}

            @foreach($subjects as $subject)
            <!-- Modal Editing -->
                @include("Backend.TeacherInterface.Modals.Subjects.Edit")
                {{--ModalDescription--}}
                @include("Backend.TeacherInterface.Modals.Subjects.Description")

                @include("Backend.TeacherInterface.Modals.Subjects.Delete")
            @endforeach

            <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
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
                            <button class="btn btn-blue" data-toggle="modal" data-target="#descriptionModal_{{$subject->id}}" >Description</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$subject->id}}" >Edit</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$subject->id}}">Delete</button>
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
