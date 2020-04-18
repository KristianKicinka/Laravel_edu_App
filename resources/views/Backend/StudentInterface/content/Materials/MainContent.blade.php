<header class="panel-head container-fluid py-3">
    <h1>Materiály</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
    {{--Include header--}}
    @include('Backend.StudentInterface.content.Materials.header')
        {{--Include modal windows--}}
        @foreach($materials as $material)
            @include('Backend.StudentInterface.modals.Materials.Description')
            @include('Backend.TeacherInterface.modals.Materials.Material')

        @endforeach

        {{--Main Content--}}
        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov materiálu</th>
                    <th>Kurz</th>
                    <th>Predmet</th>
                    <th>Súbor</th>
                    <th>Možnosti</th>
                </tr>
                </thead>

                <tbody>
                @forelse($materials as $material)




                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->title }}</td>
                        <td>{{ json_decode($material->class,true) }}</td>
                        <td>{{ $material->subject }}</td>
                        <td><a class="text-dark" href="{{ route('materialDownload', $material->filename) }}"><i class="fas fa-download pr-2"></i>{{ $material->original_filename }}</a></td>
                        <td class="materials-controls">
                            <button class="btn btn-blue" data-toggle="modal" data-target="#descriptionModal_{{$material->id}}" >Popis</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#materialModal_{{$material->id}}" >Zobraziť materiál</button>
                            @if(Auth::user()->is_teacher==1)
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$material->id}}" >Upraviť</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$material->id}}">Vymazať</button>
                            @endif
                        </td>

                    </tr>
                @empty
                    <td colspan="6"> Nič na zobrazenie</td>
                @endforelse
                </tbody>
            </table>
            {{ $materials->links() }}
        </div>

    </div>
</main>
