<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//   return view('welcome');
// });

Route::get('/404', function () {
  return view('404');
})->name('404');

Route::get('statistics', function () {
  return view('statistics');
})->name('statistics');

Route::get('/', [BankController::class, 'bank']);
Route::get('/phpinfo', [BankController::class, 'phpinfo'])->name('about-php');
Route::get('/black', [BankController::class, 'index']);

Route::prefix('clients')->name('clients-')->group(function () {
  Route::get('/', [ClientController::class, 'index'])->name('index');
  Route::get('/create', [ClientController::class, 'create'])->name('create');
  Route::post('/', [ClientController::class, 'store'])->name('store');
  Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('edit');
  Route::put('/{client}', [ClientController::class, 'update'])->name('update');
  Route::get('/delete/{client}', [ClientController::class, 'delete'])->name('delete');
  Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
});

Route::prefix('accounts')->name('accounts-')->group(function () {
  Route::get('/', [AccountController::class, 'index'])->name('index');
  Route::get('/create', [AccountController::class, 'create'])->name('create');
  Route::post('/', [AccountController::class, 'store'])->name('store');
  Route::get('/edit/{client}', [AccountController::class, 'edit'])->name('edit');
  Route::put('/{client}', [AccountController::class, 'update'])->name('update');
  Route::get('/delete/{client}', [AccountController::class, 'delete'])->name('delete');
  Route::delete('/{client}', [AccountController::class, 'destroy'])->name('destroy');
});

Auth::routes();

Route::get('/statistics', [App\Http\Controllers\HomeController::class, 'index'])->name('statistics');