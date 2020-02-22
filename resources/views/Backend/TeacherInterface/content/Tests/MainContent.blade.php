<header class="panel-head container-fluid py-3">
    <h1>Testy</h1>
</header>

<main class="panel-main-content">

    <div class="row container-fluid">
        @include('Backend.TeacherInterface.content.Tests.header')

        @foreach($tests as $test)
            <!-- Modal Editing -->
                {{--@include("Backend.TeacherInterface.modals.Tests.Edit")--}}
                {{--ModalDescription--}}
                {{--@include("Backend.TeacherInterface.modals.Tests.Show")--}}
                @include("Backend.TeacherInterface.modals.Tests.Activate")

                @include("Backend.TeacherInterface.modals.Tests.Delete")
            @endforeach

        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov testu</th>
                    <th>Počet otázok</th>
                    <th>Počet možností</th>
                    <th>Možnosti</th>
                </tr>
                </thead>

                <tbody>
                @forelse($tests as $test)


                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->questions_count }}</td>
                        <td>{{ $test->options_count }}</td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#showModal_{{$test->id}}" onclick="{{ route("testShow",$test->id) }}">Ukázať test</button>

                            @if($test->is_active==0)
                                <button class="btn btn-blue" data-toggle="modal" data-target="#activateModal_{{$test->id}}" >Aktivovať</button>
                            @else
                                <button class="btn btn-blue" data-toggle="modal" disabled data-target="#activateModal_{{$test->id}}" >Aktivovať</button>
                            @endif
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$test->id}}">Vymazať</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="5"> Nič na zobrazenie</td>
                @endforelse
                </tbody>
            </table>
            {{ $tests->links() }}
        </div>
    </div>
</main>
