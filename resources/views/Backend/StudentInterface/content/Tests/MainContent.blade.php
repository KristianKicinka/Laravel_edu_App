<header class="panel-head container-fluid py-3">
    <h1>Tests</h1>
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
                    <th>Test ID</th>
                    <th>Name of Test</th>
                    <th>Questions Count</th>
                    <th>Your score</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse($tests as $test)


                    <tr>
                        <td>{{ $test->test_id }}</td>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->questions_count }}</td>
                        <td>@if($test->points){{
                            $test->points." / ".$test->max_points
                        }} @else {{ "0 / 0" }}</td>
                        @endif
                        <td>
                            <button class="btn btn-blue" onclick="window.open('{{ route('Testing',$test->test_id) }}','_blank')">Take Test</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="5"> Nothing to display</td>
                @endforelse
                </tbody>
            </table>
            {{ $tests->links() }}
        </div>
    </div>
</main>
