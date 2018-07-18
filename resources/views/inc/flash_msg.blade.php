@if (session('suc'))
    <div class="alert alert-success">
        {{ session('suc') }}
    </div>
@endif

@if (session('err'))
    <div class="alert alert-success">
        {{ session('err') }}
    </div>
@endif