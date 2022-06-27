<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PresenceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard.home');
        return redirect('/home');
    })->name('dashboard');

    // Route::get('home', function () {
    //     return view('dashboard.home');
    // });

    Route::get('home', [DashboardController::class, 'index']);


    // CRUD Customer
    Route::resource('customers', CustomerController::class);

    // CRUD products
    Route::resource('products', ProductController::class);
    Route::get('products/harga', [ProductController::class, 'harga'])->name('products.harga');

    // CRUD transactions
    Route::resource('transactions', TransactionController::class);

    // CRUD presences
    Route::resource('presences', PresenceController::class);
    Route::post('presences/transactionsData', [PresenceController::class, 'transactionsData'])->name('presences.transactionsData');

});
