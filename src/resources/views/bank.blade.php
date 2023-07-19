@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <h1 class="text-center">:: Black Bank ::</h1>
</div>
<div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 50px;">
  <div>Laravel v{{ Illuminate\Foundation\Application::VERSION }}
    : <a target="blank" href="{{route('about-php')}}">PHP v{{ PHP_VERSION }}</a>
    : &copy; sauliusinfo
  </div>
</div>
<div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 10px;">
  bankApp runs on server :
  <a target="blank" href="https://www.nginx.com">{{ $serverInfo }}</a>
</div>
<div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 100px;">
  <button type="button" class="btn btn-outline-danger" onclick="window.location.href = '{{route('404')}}'">Support</button>
</div>
@endsection