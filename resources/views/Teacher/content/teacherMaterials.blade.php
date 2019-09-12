<header class="panel-head container-fluid py-3">
    <h1>Materials</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Materials',
                ]) }}
            </div>
            <button class="btn btn-primary float-lg-right mr-2"> New Material</button>
        </header>
    </div>
</main>
