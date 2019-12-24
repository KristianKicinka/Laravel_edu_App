<header class="panel-head container-fluid py-3">
    <h1>Materials</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
    {{--Include header--}}
    @include('Backend.TeacherInterface.content.Materials.header')
        {{--Include modal windows--}}
    @include('Backend.TeacherInterface.modals.Materials.create')
        @foreach($materials as $material)
            @include('Backend.TeacherInterface.modals.Materials.Description')
            @include('Backend.TeacherInterface.modals.Materials.Delete')
        @endforeach

        {{--Main Content--}}
        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Material ID</th>
                    <th>Name of material</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @forelse($materials as $material)




                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->title }}</td>
                        <td>{{ $material->class }}</td>
                        <td>{{ $material->subject }}</td>
                        <td><a class="text-dark" href="{{ route('materialDownload', $material->filename) }}"><i class="fas fa-download pr-2"></i>{{ $material->original_filename }}</a></td>
                        <td>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#descriptionModal_{{$material->id}}" >Description</button>
                            <button class="btn btn-blue" data-toggle="modal" data-target="#editModal_{{$material->id}}" >Edit</button>
                            <button class="btn btn-orange" data-toggle="modal" data-target="#deleteModal_{{$material->id}}">Delete</button>
                        </td>

                    </tr>
                @empty
                    <td colspan="4"> Nothing to display</td>
                @endforelse
                </tbody>
            </table>
            {{ $materials->links() }}
        </div>

    </div>
</main>
