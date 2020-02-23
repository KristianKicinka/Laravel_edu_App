<header class="panel-head container-fluid py-3">
    <h1>Aktuality</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
        @include("Backend.AdminInterface.content.Actuality.header")
        <!-- Modal Create-->
        @include("Backend.AdminInterface.modals.Actuality.Create")

        {{--Content--}}

            @foreach($actualities as $actuality)
            <!-- Modal Editing -->
               {{-- @include("Backend.AdminInterface.modals.Actuality.Edit")--}}
                {{--ModalDescription--}}
                @include("Backend.AdminInterface.modals.Actuality.Description")
                @include("Backend.AdminInterface.modals.Actuality.ShowImage")

                @include("Backend.AdminInterface.modals.Actuality.Delete")
            @endforeach


            <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Názov</th>
                        <th>Možnosti</th>
                    </tr>
                    </thead>

                    <tbody>
                @forelse($actualities as $actuality)


                    <tr>
                        <td>{{ $actuality->id }}</td>
                        <td>{{ $actuality->title }}</td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#descriptionModal_{{$actuality->id}}" >Popis</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#imageModal_{{$actuality->id}}" >Zobraziť obrázok</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$actuality->id}}">Vymazať</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="4"> Nič na zobrazenie</td>
                @endforelse
                    </tbody>
                </table>
                {{ $actualities->links() }}
            </div>

            </div>
</main>
