<header class="panel-head container-fluid py-3">
    <h1>Courses</h1>
</header>


    <div class="row container-fluid">
        @include('Backend.StudentInterface.content.Courses.header')

        {{--Including action event modal boxes--}}
        @foreach($courses as $course)
                {{--ModalDescription--}}
                @include("Backend.StudentInterface.modals.Courses.Students")
            @endforeach
        {{--Main Content--}}

        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Name of course</th>
                    <th>Course Materials</th>
                    <th>Tests in course</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse($courses as $course)




                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{--{{ $course->count_of_students }}--}}...</td>
                        <td>{{--{{ (json_decode($course->subject,true)[0])}}--}}...</td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#studentModal_{{$course->id}}" >Students</button>
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

