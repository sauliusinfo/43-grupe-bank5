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

    return view('bank',
    [
      'clients' => $clients,
      'accounts' => $accounts,
      'serverInfo' => $serverInfo
    ]);
    // return view('bank', compact('serverInfo'));
  }
}
