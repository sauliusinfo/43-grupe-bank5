@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h5>Accounts Of:
        {{(request()->query('id'))
          ? request()->query('name').' '.request()->query('sname').' ['.request()->query('cid').']'
          : 'All Clients'
        }}
      </h5>

      <table class="table table-dark table-hover my-table">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th>Account No.</th>
            <th>Amount</th>
            <th colspan="3"></th>
          </tr>
        </thead>
        <tbody>
          @php
          $counter = 1;
          @endphp
          
          @forelse($accounts as $account)
          <tr>
            <td scope="row">{{$counter}}.</td>
            <td>{{$account->account_no}}</td>
            <td>{{$account->amount}}</td>
            <td>
              <div class="text-center">
                <button type="button" class="btn btn-outline-success edit"
                  onclick="window.location.href='#'"></button>
              </div>
            </td>
            <td>
              <div class="text-center">
                <button type="button" class="btn btn-outline-danger delete"
                  onclick="window.location.href='#'"
                  {{($account->amount > 0) ? 'disabled' : ''}}></button>
              </div>
            </td>
          </tr>
          @php
          $counter++;
          @endphp
          
          @empty
          <tr>
            <td colspan="5">
              <p class="text-center" style="color: crimson">Client Has No Accounts</p>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

      <div data-bs-theme="dark">
        {{$accounts->appends(request()->query())->links('pagination::bootstrap-5')}}
      </div>

    </div>
  </div>
</div>
@endsection