

<header class="panel-head container-fluid py-3">
    <h1>Domov</h1>
</header>

<main id="main" class="panel-main-content">
    <div class="row">
        <div class="date-time col-md-3 px-3 py-3 shadow p-3 mb-5 bg-white rounded text-left d-inline-block text-center">
            <div class="my-4">
                <h3>Dnes je :</h3>
                <span id="ct"></span>
            </div>
        </div>
        <div class="teacher-tests col-md-3 px-3 py-3 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ml-4">
            <h3>Vaše testy:</h3>
            <p>počet testov : {{ $tests_count }}</p>
            <button class="btn btn-orange float-lg-right mt-3" onclick="window.location='{{ route('testCreate') }}'">Vytvoriť nový test</button>
        </div>
        <div class="teacher-materials col-md-4 px-3 py-3 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ml-4">
            <h3>Vaše nahraté materiály :</h3>
            <p>počet nahratých materiálov : {{ $materials_count }}</p>
            <button class="btn btn-blue float-lg-right mt-3" onclick="window.location='{{ route('Materials') }}'" >Vytvoriť nový materiál</button>
        </div>
    </div>

</main>

