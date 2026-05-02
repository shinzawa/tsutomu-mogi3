<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisteredUserController;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminOwnerController;
use App\Http\Controllers\Admin\AdminShopController;
use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Owner\OwnerShopController;
use App\Http\Controllers\Owner\OwnerReservationController;
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
Route::post('/', [ShopController::class, 'show'])->name('shop.index.post');
Route::get('/menu2', [MenuController::class, 'show'])->name('menu.menu2');

Route::get('/register/thanks', function () {
    return view('auth.thanks');
})->name('register.thanks');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/detail/{shop_id}', [ShopController::class, 'show'])->name('shop.detail');
    Route::get('/mypage', [ShopController::class, 'mypage'])->name('shop.mypage');
    Route::get('/menu1', [MenuController::class, 'show'])->name('menu.menu1');
    Route::post('/like-toggle', [LikeController::class, 'toggle'])->name('like-toggle');
    Route::post('/reservation', [ShopController::class, 'reservation'])->name('shop.reservation');
    Route::post('/reservation/update/{reservation_id}', [ShopController::class, 'update'])->name('shop.reservation.update');

    Route::get('/done', function () {
        return view('shop.done');
    })->name('shop.done');
});

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    session()->get('unauthenticated_user')->sendEmailVerificationNotification();
    session()->put('resent', true);
    return back()->with('message', 'Verification link sent!');
})->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    session()->forget('unauthenticated_user');
    return redirect('/register/thanks');
})->name('verification.verify');

// 管理者
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/menu', [AdminOwnerController::class, 'menu'])->name('menu');
    Route::get('/owners', [AdminOwnerController::class, 'index'])->name('owners.index');
    Route::get('/owners/create', [AdminOwnerController::class, 'create'])->name('owners.create');
    Route::post('/owners', [AdminOwnerController::class, 'store'])->name('owners.store');
    Route::get('/shops', [AdminShopController::class, 'index'])->name('shops.index');
});

// 店舗代表者
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/menu', [OwnerDashboardController::class, 'menu'])->name('menu');
    Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/reservations', [OwnerReservationController::class, 'index'])->name('reservations.index');
    Route::get('/shop/edit', [OwnerShopController::class, 'edit'])->name('shop.edit');
    Route::post('/shop/update', [OwnerShopController::class, 'update'])->name('shop.update');
    Route::get('/shop/create', [OwnerShopController::class, 'create'])->name('shop.create');
    Route::post('/shop/store', [OwnerShopController::class, 'store'])->name('shop.store');

    Route::get('/reservations/{reservation}/notify', [OwnerReservationController::class, 'notifyForm'])
        ->name('reservation.notifyForm');

    Route::post('/reservations/{reservation}/notify', [OwnerReservationController::class, 'sendNotify'])
        ->name('reservation.sendNotify');
});
