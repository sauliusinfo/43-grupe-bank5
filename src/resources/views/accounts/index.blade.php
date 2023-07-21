@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5>Accounts Of:
                    {{ request()->query('id')
                        ? request()->query('name') . ' ' . request()->query('sname') . ' [' . request()->query('card_id') . ']'
                        : 'All Clients' }}
                </h5>

                <table class="table table-dark table-hover my-table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th>Account No.</th>
                            <th>Amount</th>
                            <th colspan="2">
                                <!-- Filters -->
                                @if (request()->query('id'))
                                    <!-- empty string (nothing will be displayed) -->
                                @else
                                    <div class="row">
                                        <form action="{{ route('accounts-index') }}" method="get"
                                            class="d-flex align-items-end">
                                            <div class="flex-grow-1 me-2" data-bs-theme="dark">
                                                <select class="form-select" name="filter_value">
                                                    <option value=""
                                                        @if ('' == $filterValue) selected @endif>No Filter</option>
                                                    <option value="positive_amount"
                                                        @if ('positive_amount' == $filterValue) selected @endif>
                                                        Positive
                                                    </option>
                                                    <option value="zero_amount"
                                                        @if ('zero_amount' == $filterValue) selected @endif>
                                                        Zero
                                                    </option>
                                                    <option value="negative_amount"
                                                        @if ('negative_amount' == $filterValue) selected @endif>
                                                        Negative
                                                    </option>
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-outline-success">Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = ($accounts->currentPage() - 1) * $accounts->perPage() + 1;
                        @endphp

                        @forelse($accounts as $account)
                            <tr>
                                <td scope="row">{{ $counter++ . '. ' }}</td>
                                <td>{{ $account->account_no }}
                                    @if (request()->query('id'))
                                        <!-- empty string (nothing will be displayed) -->
                                    @else
                                        <div>
                                            <small>
                                                <a href="{{ route('accounts-index', [
                                                    'id' => $account->client,
                                                    'name' => $account->client->name,
                                                    'sname' => $account->client->surname,
                                                    'card_id' => $account->client->card_id,
                                                ]) }}"
                                                    class="">
                                                    {{ $account->client->name . ' ' . $account->client->surname . ' [' . $account->client->card_id . ']' }}
                                                </a>
                                            </small>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ number_format($account->amount, 2) . ' Eur' }}</td>
                                <td>
                                    <a href="{{ route('accounts-edit', $account) }}"
                                        class="btn btn-outline-primary">Operations</a>
                                </td>
                                <td>
                                    <a href="{{ route('accounts-delete', $account) }}"
                                        class="btn btn-outline-danger delete {{-- $account->amount > 0 ? 'disabled' : '' --}}">
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center" style="color: crimson">Client Has No Accounts</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div data-bs-theme="dark">
                    {{ $accounts->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@endsection
