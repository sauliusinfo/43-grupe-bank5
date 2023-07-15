@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h5>Clients List</h5>

      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Total Accounts</th>
            <th>Total Amount</th>
          </tr>
        </thead>
        <tbody>
          @php
          $counter = 1;
          @endphp
          
          @forelse($clients as $client)
          <tr>
            <td scope="row">{{$counter}}.</td>
            <td>{{$client->name}}</td>
            <td>{{$client->surname}}</td>
            <td><a href="#">{{$client->accounts()->count()}}</a></td>
            <td>{{$client->accounts()->sum('amount')}}</td>
          </tr>
          @php
          $counter++;
          @endphp
          
          @empty
          <tr>
            <td>
              <p class="text-center">Empty table</p>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

          {{-- <ul class="list-group list-group-flush">
            @forelse($clients as $client)
            <li class="list-group-item">
              <div class="d-flex justify-content-between">
                <div>
                  <div class="d-flex">
                    <div class="ms-2">
                      <div>{{$client->name}}</div>
                      <div>{{$client->surname}}</div>
                      <div>[{{$client->colors()->count()}}]</div>
                    </div>
                  </div>
                </div>
                <div>
                  <a class="btn btn-success" href="{{route('clients-edit', $client)}}">Edit</a>
                  <a class="btn btn-danger" href="{{route('clients-delete', $client)}}">Delete</a>
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">
              <p class="text-center">No authors</p>
            </li>
            @endforelse
          </ul> --}}



    </div>
  </div>
</div>  
@endsection