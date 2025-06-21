<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('portal');
Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminVerifyMiddleware::class])->group(function () {
    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('/invitations', [\App\Http\Controllers\InvitationController::class, 'index'])->name('invitations.index');
    Route::get('/invitations/create', [\App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
    Route::post('/invitations', [\App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
    Route::delete('/invitations/{id}', [\App\Http\Controllers\InvitationController::class, 'destroy'])->name('invitations.destroy');

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class,'show'])->name('users.show');
    Route::put('/users/{id}/inactivate', [\App\Http\Controllers\UserController::class, 'inactivate'])->name('users.inactivate');
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
