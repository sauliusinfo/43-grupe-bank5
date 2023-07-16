@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-2">
      <h5>Add New Client</h5>
      
      <form method="post" action="{{route('clients-store')}}">
        <div class="mb-3" data-bs-theme="dark">
          <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name')}}">
        </div>
        <div class="mb-3" data-bs-theme="dark">
          <input name="sname" type="text" class="form-control" placeholder="Surname" value="{{old('sname')}}">
        </div>
        <div class="mb-3" data-bs-theme="dark">
          <input name="cid" type="text" class="form-control" placeholder="Card ID" value="{{old('cid')}}">
        </div>
        <button type="submit" class="btn btn-outline-success" style="width: 100%">Add</button>
        @csrf
      </form>

    </div>
  </div>
</div>
@endsection