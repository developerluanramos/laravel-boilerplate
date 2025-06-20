<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('portal');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('auth.logout');

Route::get('/invitations', [\App\Http\Controllers\InvitationController::class, 'index'])->name('invitations.index');
Route::get('/invitations/create', [\App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
Route::post('/invitations', [\App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
Route::delete('/invitations/{id}', [\App\Http\Controllers\InvitationController::class, 'destroy'])->name('invitations.destroy');

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [\App\Http\Controllers\UserController::class,'show'])->name('users.show');
Route::put('/users/{id}/inactivate', [\App\Http\Controllers\UserController::class, 'inactivate'])->name('users.inactivate');
Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

Route::group([], function () {});

Route::group(['prefix' => ''], function () {
    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
})->middleware(['auth', 'verified', 'admin']);


require __DIR__.'/auth.php';
