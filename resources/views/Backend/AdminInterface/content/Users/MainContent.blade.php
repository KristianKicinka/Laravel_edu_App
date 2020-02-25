<header class="panel-head container-fluid py-3">
    <h1>Používatelia</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
        {{--Include header--}}
        @include('Backend.AdminInterface.content.Users.header')
        @include('Backend.AdminInterface.modals.Users.Create')

        @foreach($users as $user)
            @include("Backend.AdminInterface.modals.Users.Edit")
            @include("Backend.AdminInterface.modals.Users.Delete")
        @endforeach


        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Používateľské meno</th>
                    <th>Email</th>
                    <th>Postavenie</th>
                    <th>Možnosti</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if( $user->is_teacher == 1)
                        <td>Učiteľ</td>

                        @elseif( $user->is_admin == 1)
                            <td>Administrátor</td>
                        @else
                            <td>Študent</td>
                        @endif
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$user->id}}">Upraviť</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$user->id}}">Vymazať</button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</main>
