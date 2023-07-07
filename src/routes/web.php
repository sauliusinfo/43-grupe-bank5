<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
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

Route::get('/', [BankController::class, 'bank']);
Route::get('/phpinfo', [BankController::class, 'phpinfo'])->name('about-php');
Route::get('/black', [BankController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
