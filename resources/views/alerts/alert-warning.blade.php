@if (session('status_warning'))
    <div class="alert alert-danger">
        <strong class="text-uppercase color-white">{!! session('status_warning') !!}</strong>
    </div>
@endif