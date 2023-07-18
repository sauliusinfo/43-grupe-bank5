@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <h1 class="text-center">:: Black Bank ::</h1>
</div>
  
<div class="position-absolute top-0 start-50 translate-middle-x" style="margin-top: 75px;">
  <table class="table-dark align-middle text-dark">
    <thead>
      <tr>
        <th scope="col" colspan="3"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Total Clients</th>
        <th>: {{$clients->count()}}</th>
      </tr>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Total Accounts</th>
        <th>: {{$accounts->count()}}</th>
        
      </tr>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Total Ammount</th>
        <th>: {{$accounts->sum('amount')}} Eur</th>
      </tr>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Maximum Amount in One Account</th>
        <th>: {{$accounts->max('amount')}} Eur</th>
      </tr>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Average Of Ammounts</th>
        <th>: {{round($accounts->avg('amount'),2)}} Eur</th>
      </tr>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Total Accounts With 0 Amount</th>
        <th>: {{$accounts->where('amount','=', 0)->count()}}</th>
      </tr>
      <tr>
        <th scope="row">&#8226;</th>
        <th>Total Accounts With Negative Amount</th>
        <th>: {{$accounts->where('amount','<', 0)->count()}}</th>
      </tr>
    </tbody>
  </table>
</div>

<div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 50px;">
  <div>Laravel v{{ Illuminate\Foundation\Application::VERSION }}
    : <a target="blank" href="{{ route('about-php') }}">PHP v{{ PHP_VERSION }}</a>
    : &copy; sauliusinfo
  </div>
</div>

<div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 10px;">
  bankApp runs on server :
  <a target="blank" href="https://www.nginx.com">{{ $serverInfo }}</a>
</div>

<div class="position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom: 100px;">
  <button type="button" class="btn btn-outline-danger" onclick="window.location.href = '{{ route('404') }}'">Support</button>
</div>
@endsection