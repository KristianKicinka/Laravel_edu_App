<header class="panel-head container-fluid py-3">
    <h1>Kurzy</h1>
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
                    <th>ID</th>
                    <th>Názov kurzu</th>
                    <th>Maximálny počet študentov</th>
                    <th>Predmet</th>
                    <th>Možnosti</th>
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
                            <button class="btn btn-blue" data-toggle="modal" data-target="#studentModal_{{$course->id}}" >Študenti</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$course->id}}" >Upraviť</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$course->id}}">Vymazať</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="5"> Nič na zobrazenie</td>
                @endforelse
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>

    </div>

