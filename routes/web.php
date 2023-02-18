<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineLoginController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ラインログイン用
Route::get('/linelogin', 'LineLoginController@lineLogin')->name('linelogin');
Route::get('/callback', 'LineLoginController@callback')->name('callback');