<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $clients = Client::paginate(7);

    return view('clients.index', [
      'clients' => $clients
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('clients.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'name' => 'required|max:50|min:3|alpha',
        'sname' => 'required|max:50|min:3|alpha',
        'card_id' => 'required|min_digits:11|max_digits:11|unique:clients',
      ],
      [
        'name.required' => 'Please enter client first name!',
        'name.max' => 'Client first name is too long!',
        'name.min' => 'Client first name is too short!',
        'name.alpha' => 'Client first name must contain only letters!',
        'sname.required' => 'Please enter client last name!',
        'sname.max' => 'Client last name is too long!',
        'sname.min' => 'Client last name is too short!',
        'sname.alpha' => 'Client last name must contain only letters!',
        'card_id.required' => 'Please enter client Card ID!',
        'card_id.min_digits' => 'Card ID must consist at least 11 numbers!',
        'card_id.max_digits' => 'Card ID must consist of 11 numbers!',
        'card_id.unique' => 'Card ID already exists!',
      ]
    );

    if ($validator->fails()) {
      $request->flash();
      return redirect()->back()->withErrors($validator);
    }

    $client = new Client;
    $client->name = $request->name;
    $client->surname = $request->sname;
    $client->card_id = $request->card_id;

    $client->save();
    return redirect()
      ->route('clients-index')
      ->with('success', 'New client ' . $client->name . ' ' . $client->surname . ' has been added!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Client $client)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Client $client)
  {
    return view('clients.edit', [
      'client' => $client
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Client $client)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'name' => 'required|max:50|min:3|alpha',
        'sname' => 'required|max:50|min:3|alpha',
      ],
      [
        'name.required' => 'Please enter client first name!',
        'name.max' => 'Client first name is too long!',
        'name.min' => 'Client first name is too short!',
        'name.alpha' => 'Client first name must contain only letters!',
        'sname.required' => 'Please enter client last name!',
        'sname.max' => 'Client last name is too long!',
        'sname.min' => 'Client last name is too short!',
        'sname.alpha' => 'Client last name must contain only letters!',
      ]
    );

    if ($validator->fails()) {
      $request->flash();
      return redirect()->back()->withErrors($validator);
    }

    $client->name = $request->name;
    $client->surname = $request->sname;

    $client->save();
    return redirect()
      ->route('clients-index')
      ->with('success', 'Client ' . $client->name . ' ' . $client->surname . ' details has been updated!');
  }

  /**
   * Delete a client
   */
  public function delete(Client $client)
  {
    $accSum = $client->accounts()->sum('amount');

    if ($accSum > 0) {
      return redirect()->back()->with('info', 'Can not delete client, ' . $client->name . ' ' . $client->surname . ', balance is eq ' . $accSum);
    }

    return view('clients.delete', [
      'client' => $client
    ]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Client $client)
  {
    $client->delete();
    return redirect()
      ->route('clients-index')
      ->with('success', 'Client ' . $client->name . ' ' . $client->surname . ' has been deleted!');
  }
}
