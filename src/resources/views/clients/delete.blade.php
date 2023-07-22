@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h5 class="text-end">Confirm Client Deletion</h5>

                <form method="post" action="{{ route('clients-destroy', $client) }}">
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Name</label>
                        <input type="text" class="form-control" value="{{ $client->name }}" readonly>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Surname</label>
                        <input type="text" class="form-control" value="{{ $client->surname }}" readonly>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('clients-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </div>
                    @method('delete')
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
