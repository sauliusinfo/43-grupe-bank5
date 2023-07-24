<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TransferController;

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
Route::get('/taxes', [BankController::class, 'taxes'])->name('taxes');

Route::prefix('clients')->name('clients-')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->middleware(['roles:U|A'])->name('index');
    Route::get('/create', [ClientController::class, 'create'])->middleware(['roles:U|A'])->name('create');
    Route::post('/', [ClientController::class, 'store'])->middleware(['roles:U|A'])->name('store');
    Route::get('/edit/{client}', [ClientController::class, 'edit'])->middleware(['roles:U|A'])->name('edit');
    Route::put('/{client}', [ClientController::class, 'update'])->middleware(['roles:U|A'])->name('update');
    Route::get('/delete/{client}', [ClientController::class, 'delete'])->middleware(['roles:U|A'])->name('delete');
    Route::delete('/{client}', [ClientController::class, 'destroy'])->middleware(['roles:U|A'])->name('destroy');
});

Route::prefix('accounts')->name('accounts-')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->middleware(['roles:U|A'])->name('index');
    Route::get('/create', [AccountController::class, 'create'])->middleware(['roles:U|A'])->name('create');
    Route::post('/', [AccountController::class, 'store'])->middleware(['roles:U|A'])->name('store');
    Route::get('/edit/{account}', [AccountController::class, 'edit'])->middleware(['roles:U|A'])->name('edit');
    Route::put('/{account}', [AccountController::class, 'update'])->middleware(['roles:U|A'])->name('update');
    Route::get('/delete/{account}', [AccountController::class, 'delete'])->middleware(['roles:U|A'])->name('delete');
    Route::delete('/{account}', [AccountController::class, 'destroy'])->middleware(['roles:U|A'])->name('destroy');
});

Route::get('/transfers', [TransferController::class, 'transfer'])->middleware(['roles:U|A'])->name('transfers');
Route::post('/transfers', [TransferController::class, 'execute'])->middleware(['roles:U|A'])->name('execute');

Auth::routes();

Route::get('/statistics', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['roles:U|A'])->name('statistics');
