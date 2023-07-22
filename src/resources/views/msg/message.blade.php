<div class="position-absolute top-0 start-50 translate-middle-x" style="margin-top: 75px;">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {!! session()->get('success') !!}
        </div>
    @endif
    @if (session()->has('info'))
        <div class="alert alert-info" role="alert">
            {!! session()->get('info') !!}
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            {!! session()->get('warning') !!}
        </div>
    @endif
</div>
