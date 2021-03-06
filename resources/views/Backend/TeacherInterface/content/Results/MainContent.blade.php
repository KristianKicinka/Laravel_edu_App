<header class="panel-head container-fluid py-3">
    <h1>Výsledky testov</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
    {{--Include header--}}
    @include('Backend.TeacherInterface.content.Results.header')
        {{--Include modal windows--}}
        @foreach($results as $result)
            {{--@include('Backend.TeacherInterface.modals.Results.Edit')--}}
            @include('Backend.TeacherInterface.modals.Results.Delete')
        @endforeach

        {{--Main Content--}}
        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno Študenta</th>
                    <th>Kurz</th>
                    <th>Názov testu</th>
                    <th>Skóre</th>
                    <th>Percento</th>
                    <th>Možnosti</th>
                </tr>
                </thead>

                <tbody>
                @forelse($results as $result)




                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->user_name }}</td>
                        <td>{{ json_decode($result->activate_for,true)[0] }}</td>
                        <td>{{ $result->test_name }}</td>
                        <td>{{ $result->points }}</td>
                        <td>{{ $result->percentage }}</td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$result->id}}" >Upraviť</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$result->id}}">Vymazať</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="6"> Nič na zobrazenie</td>
                @endforelse
                </tbody>
            </table>
            {{ $results->links() }}
        </div>

    </div>
</main>
