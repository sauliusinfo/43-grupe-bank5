@extends('layouts.app')

@section('content')
<div class="vh-100 my-bg">
  <div class="container h-100">
    
    <div class="row d-flex justify-content-center align-items-center h-100">
      <h1 class="text-center">:: Black Bank ::</h1>
    </div>
  
    <div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 50px;">
      <div>Laravel v{{ Illuminate\Foundation\Application::VERSION }}
        <a target="blank" href="{{ route('about-php') }}">(PHP v{{ PHP_VERSION }})</a>
        &copy; sauliusinfo
      </div>
    </div>
    
    <div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 10px;">
      Black Bank runs on {{ $serverInfo }} server
    </div>

    <div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 100px;">
      <button type="button" class="btn btn-outline-danger" onclick="window.location.href = '{{ route('404') }}'">
        Support</button>
    </div>

</div>
@endsection