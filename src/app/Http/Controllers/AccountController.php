<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('id');
        // dd($query);

        $accounts = Account::query();

        if ($query) {
            $accounts->where('client_id', '=', $query);
            // ->orWhere('email', 'LIKE', '%' . $query . '%');
        }

        // Filter
        $filterValue = $request->filter_value ?? '0';

        // Pagination
        $perPage = (int) 7;

        if ($request->s) {

            $accounts = Account::where('account', 'like', '%' . $request->s . '%')->paginate($perPage)->withQueryString();
        } else {
            $accounts = Account::select('accounts.*');

            if ($filterValue == 'positive_amount') {
                $accounts = $accounts->where('amount', '>', 0);
            } elseif ($filterValue == 'zero_amount') {
                $accounts = $accounts->where('amount', '=', 0);
            } elseif ($filterValue == 'negative_amount') {
                $accounts = $accounts->where('amount', '<', 0);
            }

            $accounts = $accounts->paginate($perPage)->withQueryString();
        }

        return view('accounts.index', [
            'accounts' => $accounts,
            'filterValue' => $filterValue,
            'perPage' => $perPage,
            's' => $request->s ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $account_no = Account::ibanLT();

        return view('accounts.create', [
            'clients' => $clients,
            'account_no' => $account_no,
        ]);
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'client_id' => 'required|integer',
                'account_no' => 'required|unique:accounts|size:20',
            ],
            [
                'client_id.required', 'client_id.integer' => 'Please select the client!',
                'account_no.unique' => 'Account already exists!',
                'account_no.size' => 'Account No incorrect!',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $account = new Account;

        $account->account_no = $request->account_no;
        $account->client_id = $request->client_id;
        $account->amount = 0;

        $account->save();
        return redirect()
            ->route('accounts-index')
            ->with('success', 'New account ' . $account->account_no . ' for client ' . $account->client->name . ' ' . $account->client->surname . ' has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $clients = Client::all();

        return view('accounts.edit', [
            'account' => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $amount = $request->amount;

        $validator = Validator::make(
            $request->all(),
            [
                'amount' => ['required', 'min:0', 'not_in:0', 'numeric']
            ],
            [
                'amount.required' => 'Please enter the amount!',
                'amount.min', 'amount.not_in' => 'The amount must be a positive digit!'
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        // Plus
        if (isset($request->plus)) {
            $account->amount += $amount;

            $account->save();
            return redirect()
                ->route('accounts-index')
                ->with('success', $amount . ' € has been added to ' . $account->client->name . ' ' . $account->client->surname . ' [' . $account->account_no . ']');
        }

        // Minus
        if (isset($request->minus)) {
            if ($account->amount < $amount) {
                return redirect()
                    ->back()
                    ->with('warning', $amount . ' € exceeds ' . $account->client->name . ' ' . $account->client->surname . ' account amount ' . $account->amount . ' Eur');
            }
            $account->amount -= $amount;

            $account->save();
            return redirect()
                ->route('accounts-index')
                ->with('success', $amount . ' € has been withdrawn from ' . $account->client->name . ' ' . $account->client->surname . ' [' . $account->account_no . ']');
        }
    }

    /**
     * Delete account
     */
    public function delete(Account $account)
    {
        if ($account->amount > 0) {
            return redirect()->back()->with('warning', $account->client->name . ' ' . $account->client->surname . ' Account No ' . $account->account_no . ' has money');
        }

        return view('accounts.delete', [
            'account' => $account
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {

        $account->delete();
        return redirect()
            ->route('accounts-index')
            ->with('success', $account->client->name . ' ' . $account->client->surname . ' account No ' . $account->account_no . ' has been deleted');
    }
}
