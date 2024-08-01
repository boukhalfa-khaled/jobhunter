<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ListringController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [ListringController::class, 'index']);

Route::get('/', [ListringController::class, 'index'])
    ->name('listings.index');


Route::get('/dashboard', [RegisteredUserController::class, 'dashboard'] )
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/listings/create', [ListringController::class, 'create'])
    ->name('listings.create')->middleware(['auth', 'verified']);

Route::post('/listings', [ListringController::class, 'post'])
    ->name('listings.post');

Route::get('/listings/{listing:slug}/toggleActive', [ListringController::class, 'toggleActive'])
    ->name('listings.toggleActive');

Route::get('/listings/{listing:slug}', [ListringController::class, 'show'])
    ->name('listings.show');

Route::get('/listings/{listing:slug}/apply', [ListringController::class, 'apply'])
    ->name('listings.apply');

require __DIR__.'/auth.php';
