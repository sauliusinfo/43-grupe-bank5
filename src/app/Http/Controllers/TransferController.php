<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TransferController extends Controller
{
    public function transfer()
    {
        $clients = Client::all();
        $accounts = Account::all();

        return view('transfers', [
            'clients' => $clients,
            'accounts' => $accounts,
        ]);
    }

    public function execute(Account $account, Request $request)
    {
        $amount = $request->amount;

        $validator = Validator::make(
            $request->all(),
            [
                'from_account_id' => 'integer',
                'to_account_id' => [
                    'integer',
                    Rule::notIn([$request->input('from_account_id')]),
                ],
                'amount' => ['required', 'min:0', 'numeric'],
            ],
            [
                'from_account_id.integer' => 'Please select the account From Client!',
                'to_account_id.integer' => 'Please select the account To Client!',
                'to_account_id.not_in' => 'The accounts must be different!',
                'amount.required' => 'Please enter the amount!',
                'amount.min' => 'The amount must be a positive digit!',
                'amount.not_in' => 'The amount must be a positive digit!',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $account = Account::find($request->from_account_id);
        $account2 = Account::find($request->to_account_id);

        if ($account->amount >= $request->amount) {
            $account->amount -= $request->amount;
            $account2->amount += $request->amount;

            $account->save();
            $account2->save();
            return redirect()->back()->with('success', $amount . ' Eur transfered:' . "<br>" . 'FROM: ' . $account->client->name . ' ' . $account->client->surname . ' [' . $account->account_no . ']' . "<br>" . 'TO: ' . $account2->client->name . ' ' . $account2->client->surname . ' [' . $account2->account_no . ']');
        }

        return redirect()->back()->with('warning', $account->client->name . ' ' . $account->client->surname . ' [' . $account->account_no . '] not transfered!');
    }
}
