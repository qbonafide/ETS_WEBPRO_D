<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/location', fn() => view('location'))->name('location');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/booking/individual', [BookingController::class, 'individual'])->name('booking.individual');
    Route::get('/booking/group', [BookingController::class, 'group'])->name('booking.group');
    Route::get('/booking/vip', [BookingController::class, 'vip'])->name('booking.vip');

    Route::post('/booking/time', [BookingController::class, 'time'])->name('booking.time');
    Route::post('/booking/payment', [BookingController::class, 'payment'])->name('booking.payment');
    Route::post('/booking/payment/upload', [BookingController::class, 'uploadPayment'])->name('booking.payment.upload');

    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/reservation/cancel/{id}', [ReservationController::class, 'cancel'])->name('reservation.cancel');
    Route::get('/reservation/change/{id}', [ReservationController::class, 'beginChange'])->name('reservation.beginChange');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    })->name('logout');
});
