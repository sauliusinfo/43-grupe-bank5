@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-10">
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
          $counter = ($accounts->currentPage() - 1) * $accounts->perPage() + 1;
          @endphp
          
          @forelse($accounts as $account)
          <tr>
            <td scope="row">{{$counter++}}.</td>
            <td>{{$account->account_no}}</td>
            <td>{{$account->amount}}</td>
            <td>
              <a href="#" class="btn btn-outline-primary">Operations</a>
            </td>
            <td>
              <a href="#" class="btn btn-outline-success edit"></a>
            </td>
            <td>
              <a href="#"
                class="btn btn-outline-danger delete {{($account->amount > 0) ? 'disabled' : ''}}">
              </a>
            </td>
          </tr>
          
          @empty
          <tr>
            <td colspan="6">
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