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

    Route::get('/done', function () {
        return view('shop.done');
    })->name('shop.done');
});

// Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('email');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    // $request->user()->sendEmailVerificationNotification();
    session()->get('unauthenticated_user')->sendEmailVerificationNotification();
    session()->put('resent', true);
    return back()->with('message', 'Verification link sent!');
})->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    // Auth::loginUsingId($request->route('id'));
    $request->fulfill();
    // Auth::logout();
    session()->forget('unauthenticated_user');
    return redirect('/register/thanks');
})->name('verification.verify');

