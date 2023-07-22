@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h5 class="text-end">Transfers</h5>

                <form method="post" action="{{ route('execute') }}">
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">From Client</label>
                        <select name="from_account_id" class="form-select">
                            <option>Select Account</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}" @if ($account->id == old('from_account_id')) selected @endif>
                                    {{ $account->account_no }}, {{ $account->client->name }}
                                    {{ $account->client->surname }}, Balance: {{ $account->amount }} Eur</option>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">To Client</label>
                        <select name="to_account_id" class="form-select">
                            <option>Select Account</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}" @if ($account->id == old('to_account_id')) selected @endif>
                                    {{ $account->account_no }}, {{ $account->client->name }}
                                    {{ $account->client->surname }}, Balance: {{ $account->amount }} Eur</option>
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label class="form-lable">Amount</label>
                        <input id="amountInput" name="amount" type="text" class="form-control" placeholder="0.00">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('accounts-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-success">Transfer</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
