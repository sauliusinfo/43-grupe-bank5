<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function phpInfo()
    {
        return phpinfo();
    }

    public function bank(Request $request)
    {
        // dump($request);
        $serverInfo = $request->server('SERVER_SOFTWARE');

        $clients = Client::all();
        $accounts = Account::all();

        return view(
            'bank',
            [
                'clients' => $clients,
                'accounts' => $accounts,
                'serverInfo' => $serverInfo
            ]
        );
        // return view('bank', compact('serverInfo'));
    }

    public function taxes()
    {
        $clients = Client::all();
        $ids = $clients->pluck('id')->toArray();
        $sum = 0;
        $count = 0;
        $clientNoAcc = 0;

        foreach ($ids as $id) {
            $account = Account::where('client_id', $id)->first();
            if (!is_null($account)) {
                $account->amount -= 5;
                $account->save();
                $sum += 5;
                $count++;
            } else {
                $clientNoAcc++;
            }
        }
        return redirect()->back()->with('success', 'Total sum of taxes ' . $sum . 'Eur, was taken from ' . $count . ' clients. ' . $clientNoAcc . ' clients has no accounts.');
    }
}
