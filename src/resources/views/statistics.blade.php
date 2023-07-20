@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-dark text-white">
        <h1 class="card-title text-center">{{ __('B&B Statistics') }}</h1>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          {{-- {{ __('You are logged in!') }} --}}

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Total Clients</div>
            <div class="col-md-3">{{ $clients->count() }}</div>
          </div>

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Total Accounts</div>
            <div class="col-md-3">{{ $accounts->count() }}</div>
          </div>

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Total Ammount</div>
            <div class="col-md-3">{{ number_format($accounts->sum('amount'), 2).' Eur' }}</div>
          </div>

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Maximum Amount in One Account</div>
            <div class="col-md-3">{{ number_format($accounts->max('amount'), 2).' Eur' }}</div>
          </div>

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Average Of Ammounts</div>
            <div class="col-md-3">{{ number_format(round($accounts->avg('amount'),2), 2).' Eur' }}</div>
          </div>

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Total Accounts With 0 Amount</div>
            <div class="col-md-3">{{ $accounts->where('amount','=', 0)->count() }}</div>
          </div>

          <div class="row">
            <div class="col-md-1">&#8226;</div>
            <div class="col-md-8">Total Accounts With Negative Amount</div>
            <div class="col-md-3">{{ $accounts->where('amount','<', 0)->count() }}</div>
          </div>

          <hr>
          <div class="row">
            <div class="d-grid gap-2">
              <a href="{{ route('404') }}" class="btn btn-outline-danger">Take Taxes</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
