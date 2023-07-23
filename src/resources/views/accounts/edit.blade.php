@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h5 class="text-end">Account Options</h5>

                <form method="post" action="{{ route('accounts-update', $account) }}">

                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-label">Account No</label>
                        <input name="" type="text" class="form-control" value="{{ $account->account_no }}"
                            readonly>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-label">Client</label>
                        <input name="" type="text" class="form-control"
                            value="{{ $account->client->name . ' ' . $account->client->surname }}" readonly>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-label">Amount</label>
                        <input id="amountInput" name="amount" type="text" class="form-control" placeholder="0.00">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('accounts-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-success" name="plus" value="true"
                            id="plusButton">Plus</button>
                        <button type="submit" class="btn btn-outline-danger" name="minus" value="true"
                            id="minusButton">Minus</button>
                    </div>
                    @method('PUT')
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
