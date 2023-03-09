<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineLoginController;
use App\Http\Controllers\LineMessengerController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\ManagerOrderController;
use App\Http\Controllers\RegisterFromLINEController;
use App\Http\Controllers\OrderController;

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

Route::get('/line', function () {
    return view('guest.fromLine');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ラインログイン用
Route::get('/linelogin', [LineLoginController::class, 'lineLogin'])->name('linelogin');
Route::get('/callback', [LineLoginController::class, 'callback'])->name('callback');

// LINE メッセージ受信
Route::post('/line/webhook', [LineMessengerController::class, 'webhook'])->name('line.webhook');
// LINE メッセージ送信用
Route::get('/line/message', [LineMessengerController::class, 'message']);

// LINEで初回登録した人に名前を追加してもらう
Route::get('/lineregister', [RegisterFromLINEController::class, 'index'])->name('lineregister.index');
Route::post('/lineregister', [RegisterFromLINEController::class, 'update'])->name('lineregister.update');

//ログインユーザー以上
Route::group(['middleware' => 'auth'], function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/check', [OrderController::class, 'check'])->name('order.check');
    Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');
});

// マネージャー以上
Route::prefix('manager')
    ->middleware('can:manager-higher')
    ->group(function () {
        Route::get('/', [ManagerUserController::class, 'index'])->name('manager.index');
        Route::get('/ordered', [ManagerOrderController::class, 'index'])->name('manager.order.index');
        // Route::post('/ordered', [ManagerOrderController::class, 'update'])->name('manager.order.update');
        Route::get('/past', [ManagerOrderController::class, 'past'])->name('manager.order.past');
        Route::get('/show/{id}', [ManagerUserController::class, 'show'])->name('manager.show');
        // Route::get('/', [ManagerUserController::class, 'show'])->name('manager.show');
    });
// 管理者のみ