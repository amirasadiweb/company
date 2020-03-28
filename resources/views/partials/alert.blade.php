@if(session('success'))
    <div class="alert alert-success " style="text-align: center" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('delete'))
    <div class="alert alert-danger" style="text-align: center" role="alert">
        {{ session('delete') }}
    </div>
@endif

@if(session('primary'))
    <div class="alert alert-primary" style="text-align: center" role="alert">
        {{ session('primary') }}
    </div>
@endif

