<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
  public function phpInfo() {
    return phpinfo();
  }
  
  public function bank(Request $request) {
    // dump($request);
    $serverInfo = $request->server('SERVER_SOFTWARE');
    return view('bank', compact('serverInfo'));
  }
}
