<header class="panel-head container-fluid py-3">
    <h1>Classrooms</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        @include('Backend.TeacherInterface.content.Courses.header')

        {{--Including modal windows--}}
       @include('Backend.TeacherInterface.Modals.Courses.Create')

        {{--Including action event modal boxes--}}
        @foreach($courses as $course)
            <!-- Modal Editing -->
                {{--@include("Backend.TeacherInterface.Modals.Courses.Edit")--}}
                {{--ModalDescription--}}
                @include("Backend.TeacherInterface.Modals.Courses.Students")

                @include("Backend.TeacherInterface.Modals.Courses.Delete")
            @endforeach
        {{--Main Content--}}

        <div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Name of course</th>
                    <th>Max number of students</th>
                    <th>subject</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse($courses as $course)




                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->count_of_students }}</td>
                        <td>{{ $course->subject }}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#studentModal_{{$course->id}}" >Students</button>
                            <button class="btn btn-success" data-toggle="modal" data-target="#editModal_{{$course->id}}" >Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_{{$course->id}}">Delete</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="4"> Nothing to display</td>
                @endforelse
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>

    </div>
</main>
