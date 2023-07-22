@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <h5 class="text-end">Add New Client</h5>

      <form method="post" action="{{ route('clients-store') }}">
        <div class="mb-3" data-bs-theme="dark">
          <input name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}">
        </div>
        <div class="mb-3" data-bs-theme="dark">
          <input name="sname" type="text" class="form-control" placeholder="Surname" value="{{ old('sname') }}">
        </div>
        <div class="mb-3" data-bs-theme="dark">
          <input name="card_id" type="text" class="form-control" placeholder="Card ID" value="{{ old('card_id') }}">
        </div>
        <div class="d-flex justify-content-between">
          <a href="{{route('clients-index')}}" class="btn btn-outline-secondary">Cancel</a>
          <button type="submit" class="btn btn-outline-success">Add</button>
        </div>
        @csrf
      </form>

    </div>
  </div>
</div>
@endsection
