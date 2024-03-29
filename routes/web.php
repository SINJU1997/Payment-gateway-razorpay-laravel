<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/success', 'App\Http\Controllers\PaymentController@success');
Route::post('/payment', 'App\Http\Controllers\PaymentController@payment');
Route::post('/pay', 'App\Http\Controllers\PaymentController@pay');