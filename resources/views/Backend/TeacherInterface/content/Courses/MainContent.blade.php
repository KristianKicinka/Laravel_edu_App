<header class="panel-head container-fluid py-3">
    <h1>Courses</h1>
</header>


    <div class="row container-fluid">
        @include('Backend.TeacherInterface.content.Courses.header')

        {{--Including modal windows--}}
       @include('Backend.TeacherInterface.modals.Courses.Create')

        {{--Including action event modal boxes--}}
        @foreach($courses as $course)
            <!-- Modal Editing -->
                {{--@include("Backend.TeacherInterface.modals.Courses.Edit")--}}
                {{--ModalDescription--}}
                @include("Backend.TeacherInterface.modals.Courses.Students")

                @include("Backend.TeacherInterface.modals.Courses.Delete")
            @endforeach
        {{--Main Content--}}

        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
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
                        <td>{{ (json_decode($course->subject,true)[0])}}</td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#studentModal_{{$course->id}}" >Students</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$course->id}}" >Edit</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$course->id}}">Delete</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="5"> Nothing to display</td>
                @endforelse
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>

    </div>

