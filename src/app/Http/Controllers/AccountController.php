<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

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

    $accounts = $accounts->paginate(7);
    // dd($accounts);

    return view('accounts.index', [
      'accounts' => $accounts
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('accounts.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
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
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Account $account)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Account $account)
  {
    //
  }
}
