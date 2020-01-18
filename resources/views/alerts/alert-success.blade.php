@if (session('status_success'))
    <div class="alert bg-primary">
        <strong class="text-uppercase color-white">{!! session('status_success') !!}</strong>
    </div>
@endif