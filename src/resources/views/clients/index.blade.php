@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5>Clients List</h5>

                <table class="table table-dark table-hover my-table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Total Accounts</th>
                            <th>Total Amount</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = ($clients->currentPage() - 1) * $clients->perPage() + 1;
                        @endphp

                        @forelse($clients as $client)
                            <tr>
                                <td scope="row">{{ $counter++ . '. ' }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->surname }}</td>
                                <td>
                                    <a href="{{ route('accounts-index', [
                                        'id' => $client,
                                        'name' => $client->name,
                                        'sname' => $client->surname,
                                        'card_id' => $client->card_id,
                                    ]) }}"
                                        class="btn btn-outline-primary d-grid gap-2">
                                        {{ $client->accounts()->count() }}
                                    </a>
                                </td>
                                <td>{{ number_format($client->accounts()->sum('amount'), 2) . ' Eur' }}</td>
                                <td>
                                    <a href="{{ route('clients-edit', $client) }}" class="btn btn-outline-success edit"></a>
                                </td>
                                <td>
                                    <a href="{{ route('clients-delete', $client) }}"
                                        class="btn btn-outline-danger delete"></a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7">
                                    <p class="text-center" style="color: crimson">Has No Clients</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div data-bs-theme="dark">
                    {{ $clients->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@endsection
