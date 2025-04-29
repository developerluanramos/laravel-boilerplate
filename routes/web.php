<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/invitations', [\App\Http\Controllers\InvitationController::class, 'index'])->name('invitations.index');
Route::get('/invitations/create', [\App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
Route::post('/invitations', [\App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
Route::delete('/invitations/{id}', [\App\Http\Controllers\InvitationController::class, 'destroy'])->name('invitations.destroy');

require __DIR__.'/auth.php';
