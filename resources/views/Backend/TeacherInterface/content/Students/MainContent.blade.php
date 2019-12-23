<header class="panel-head container-fluid py-3">
    <h1>Students</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
        {{--Include header--}}
        @include('Backend.TeacherInterface.content.Students.header')

       {{-- @foreach($users as $user)
            @include("partials.teacherStudentsEdit")
            @include("partials.teacherStudentsDelete")
        @endforeach--}}


        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-blue">Edit</button>
                            <button class="btn btn-orange">Delete</button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</main>
