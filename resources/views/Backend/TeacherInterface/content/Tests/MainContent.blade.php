<header class="panel-head container-fluid py-3">
    <h1>Tests</h1>
</header>

<main class="panel-main-content">

    <div class="row container-fluid">
        @include('Backend.TeacherInterface.content.Tests.header')

        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Name of Test</th>
                    <th>Questions Count</th>
                    <th>Options Count</th>
                </tr>
                </thead>

                <tbody>
                @forelse($tests as $test)


                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->questions_count }}</td>
                        <td>{{ $test->options_count }}</td>

                    </tr>
                @empty
                    <td colspan="4"> Nothing to display</td>
                @endforelse
                </tbody>
            </table>
            {{ $tests->links() }}
        </div>
    </div>
</main>
