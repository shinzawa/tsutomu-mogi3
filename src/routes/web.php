<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LikeController;
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

Route::get('/', [ShopController::class, 'show'])->name('shop.index');
Route::get('/menu2', [MenuController::class, 'show'])->name('menu.menu2');

Route::get('/register/thanks', function () {
    return view('auth.thanks');
})->name('register.thanks');

Route::get('/done', function () {
    return view('shop.done');
})->name('shop.done');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('shop.detail');
    Route::get('/mypage', [ShopController::class, 'mypage'])->name('shop.mypage');
    Route::get('/menu1', [MenuController::class, 'show'])->name('menu.menu1');
    Route::post('/like-toggle', [LikeController::class, 'toggle'])->name('like-toggle');
    Route::post('/reservation', [ShopController::class, 'reservation'])->name('shop.reservation');
});
