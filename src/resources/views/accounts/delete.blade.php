@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h5>Confirm Client Deletion</h5>

                <form method="post" action="{{ route('accounts-destroy', $account) }}">
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Account No</label>
                        <input name="" type="text" class="form-control" value="{{ $account->account_no }}" readonly>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Client</label>
                        <input name="" type="text" class="form-control"
                            value="{{ $account->client->name . ' ' . $account->client->surname }}" readonly>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-label">Amount</label>
                        <input name="" type="text" class="form-control" value="{{ $account->amount }}" readonly>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('accounts-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </div>
                    @method('delete')
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
