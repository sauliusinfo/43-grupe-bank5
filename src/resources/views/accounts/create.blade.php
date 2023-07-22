@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h5 class="text-end">Add New Account</h5>

                <form method="post" action="{{ route('accounts-store') }}">
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Client</label>
                        <select name="client_id" class="form-select">
                            <option>Select Client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" @if ($client->id == old('client_id')) selected @endif>
                                    {{ $client->name }} {{ $client->surname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Account No</label>
                        <input name="account_no" type="text" class="form-control" value="{{ $account_no }}" readonly>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('clients-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-success">Add</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
