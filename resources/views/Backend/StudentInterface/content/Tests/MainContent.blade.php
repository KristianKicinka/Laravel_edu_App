<header class="panel-head container-fluid py-3">
    <h1>Testy</h1>
</header>

<main class="panel-main-content">

    <div class="row container-fluid">
        @include('Backend.StudentInterface.content.Tests.header')

        @foreach($tests as $test)
            <!-- Modal Editing -->
                {{--@include("Backend.TeacherInterface.modals.Tests.Edit")--}}
                {{--ModalDescription--}}
                {{--@include("Backend.TeacherInterface.modals.Tests.Show")--}}
                {{--@include("Backend.StudentInterface.modals.Tests.Activate")--}}

                {{--@include("Backend.StudentInterface.modals.Tests.Delete")--}}
            @endforeach

        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov testu</th>
                    <th>Počet otázok</th>
                    <th>Vaše skóre</th>
                    <th>Možnosti</th>
                </tr>
                </thead>

                <tbody>
                @forelse($tests as $test)


                    <tr>
                        <td>{{ $test->test_id }}</td>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->questions_count }}</td>
                        <td>@if(isset($test->points)){{
                            $test->points." / ".$test->max_points
                        }} @else {{ "0 / 0" }}</td>
                        @endif
                        <td class="test-controls">
                            <button class="btn btn-blue" onclick="window.open('{{ route('Testing',$test->test_id) }}','_blank')">Spustiť test</button>
                            @if(isset($test->points))
                                <button class="btn btn-orange" onclick="window.open('{{ route('showResults', $test->test_id) }}','_blank')">Ukázať výsledky</button>
                                @endif
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

