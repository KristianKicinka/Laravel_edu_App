

<header class="panel-head container-fluid py-3">
    <h1>Teacher Dashboard</h1>
</header>

<main id="main" class="panel-main-content">
    <div class="row">
        <div class="date-time col-md-3 px-3 py-3 shadow p-3 mb-5 bg-white rounded text-left d-inline-block text-center">
            <div class="my-4">
                <h3>Today is :</h3>
                <span id="ct"></span>
            </div>
        </div>
        <div class="teacher-tests col-md-3 px-3 py-3 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ml-4">
            <h3>Your tests:</h3>
            <p>count of tests :</p>
            <button class="btn btn-orange float-lg-right mt-3" onclick="window.location='{{ route('testCreate') }}'">Make new Test</button>
        </div>
        <div class="teacher-materials col-md-4 px-3 py-3 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ml-4">
            <h3>Your uploaded Materials:</h3>
            <p>count of uploaded materials :</p>
            <button class="btn btn-blue float-lg-right mt-3" onclick="window.location='{{ route('Materials') }}'" >Make new Material</button>
        </div>
    </div>

</main>

