@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-dark text-white">
        <div class="card-header">{{ __('B&B Statistics') }}</div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          {{-- {{ __('You are logged in!') }} --}}

          <table class="table-dark">
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
      </div>
    </div>
  </div>
</div>
@endsection