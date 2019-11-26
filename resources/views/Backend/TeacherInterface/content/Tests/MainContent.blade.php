<header class="panel-head container-fluid py-3">
    <h1>Tests</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Tests',
                ]) }}
            </div>
            <button class="btn btn-primary float-lg-right mr-2" onclick="window.location='{{ route('testCreate') }}'"> New Test</button>
        </header>
    </div>
    <div class="row">
        <div class="container py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block">
            <h2>Tests</h2>
        </div>
    </div>
</main>
