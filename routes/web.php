<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineLoginController;
use App\Http\Controllers\LineMessengerController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\ManagerOrderController;
use App\Http\Controllers\RegisterFromLINEController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UseProductController;

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
})->name('linestart');

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
    // Route::get('/order/{receive_date}', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/register', [OrderController::class, 'register'])->name('order.register');
    Route::post('/order/create/', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/check', [OrderController::class, 'check'])->name('order.check');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{order_id}', [OrderController::class, 'index'])->name('order.index');
});

// マネージャー以上
Route::prefix('manager')
    ->middleware('can:manager-higher')
    ->group(function () {
        Route::get('/', [ManagerUserController::class, 'index'])->name('manager.index');
        Route::get('/ordered/yesterday', [ManagerOrderController::class, 'yesterday'])->name('manager.order.yesterday');
        Route::get('/ordered/tomorrow', [ManagerOrderController::class, 'tomorrow'])->name('manager.order.tomorrow');
        Route::get('/ordered/{receive_date}', [ManagerOrderController::class, 'index'])->name('manager.order.index');
        // Route::post('/ordered', [ManagerOrderController::class, 'update'])->name('manager.order.update');
        Route::get('/past', [ManagerOrderController::class, 'past'])->name('manager.order.past');
        Route::get('/show/{id}', [ManagerUserController::class, 'show'])->name('manager.show');
        // Route::get('/', [ManagerUserController::class, 'show'])->name('manager.show');
        Route::get('/products', [ProductController::class, 'index'])->name('product.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/products/create', [ProductController::class, 'store'])->name('product.store');
    });
// 管理者のみ



// 使用する商品登録
Route::post('/products/bookmark/{post}', [UseProductController::class,'store'])->name('bookmark.store');
Route::get('/products/unbookmark/{post}', [UseProductController::class, 'destroy'])->name('bookmark.destroy');