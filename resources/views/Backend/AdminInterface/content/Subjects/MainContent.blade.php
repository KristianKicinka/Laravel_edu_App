<header class="panel-head container-fluid py-3">
    <h1>Predmety</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
        @include("Backend.AdminInterface.content.Subjects.header")
        <!-- Modal Create-->
        @include("Backend.AdminInterface.modals.Subjects.Create")

        {{--Content--}}

            @foreach($subjects as $subject)
            <!-- Modal Editing -->
                @include("Backend.AdminInterface.modals.Subjects.Edit")
                {{--ModalDescription--}}
                @include("Backend.AdminInterface.modals.Subjects.Description")

                @include("Backend.AdminInterface.modals.Subjects.Delete")
            @endforeach

            <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Názov predmetu</th>
                        <th>Skratka predmetu</th>
                        <th>Možnosti</th>
                    </tr>
                    </thead>

                    <tbody>
                @forelse($subjects as $subject)


                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->shortcut }}</td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#descriptionModal_{{$subject->id}}" >Popis</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$subject->id}}" >Upraviť</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$subject->id}}">Vymazať</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="4"> Nič na zobrazenie</td>
                @endforelse
                    </tbody>
                </table>
                {{ $subjects->links() }}
            </div>

            </div>
</main>
