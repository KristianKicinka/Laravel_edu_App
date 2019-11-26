<header class="panel-head container-fluid py-3">
    <h1>Materials</h1>
</header>

<main class="panel-main-content">
    <div class="row container-fluid">
    {{--Include header--}}
    @include('Backend.TeacherInterface.content.Materials.header')
        {{--Include modal windows--}}
    @include('Backend.TeacherInterface.Modals.Materials.create')

    {{--Content--}}
        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
        <h2>Materials</h2>
        </div>

    </div>
</main>
