<header class="panel-head container-fluid py-3">
    <h1>Students</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Students',
                ]) }}
            </div>
        </header>

       {{-- @foreach($users as $user)
            @include("partials.teacherStudentsEdit")
            @include("partials.teacherStudentsDelete")
        @endforeach--}}


        <div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
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
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</main>
