<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(HomeController::class)->group(function(){
    Route::match(['get', 'post'], '/', 'home')->name('app_home');
    Route::match(['get', 'post'], '/get_checkout', 'getCheckout')->name('app_get_checkout');
});


