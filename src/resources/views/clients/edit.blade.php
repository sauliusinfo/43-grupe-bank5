@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h5>Edit Client</h5>

                <form method="post" action="{{ route('clients-update', $client) }}">
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name', $client->name) }}">
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Surname</label>
                        <input name="sname" type="text" class="form-control"
                            value="{{ old('sname', $client->surname) }}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('clients-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                    @method('PUT')
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
