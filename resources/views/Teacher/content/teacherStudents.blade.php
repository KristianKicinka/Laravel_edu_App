<header class="panel-head container-fluid py-3">
    <h1>Students</h1>
</header>

<main class="panel-main-content">
    <div class="row">
        <header class="content-header py-2 px-2 shadow-sm rounded border border-secondary container">
            <div class="forms col-sm-5 d-inline-block">
                {{ Form::search('search',null,[
                'class'=>'form-control',
                'placeholder'=>'Search Students',
                ]) }}
            </div>
        </header>
    </div>
</main>
