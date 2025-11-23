<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/fundraisers', function () {
    return view('fundraisers');
})->name('fundraisers.index');

Route::get('/campaigns/{id}', function ($id) {
    return view('campaigns.show', ['id' => $id]);
})->name('campaigns.show');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Donation History
    Route::get('/history', function () {
        return view('history');
    })->name('history');

    // Schedule Donation Flow
    Route::get('/donations/schedule', function () {
        return view('donations.schedule');
    })->name('donations.schedule');

    Route::get('/donations/schedule/step2', function () {
        return view('donations.step2');
    })->name('donations.step2');

    Route::get('/donations/schedule/step3', function () {
        return view('donations.step3');
    })->name('donations.step3');

    Route::get('/donations/confirmation', function () {
        return view('donations.confirmation');
    })->name('donations.confirmation');

    // Start Fundraiser Flow
    Route::get('/fundraisers/create', function () {
        return view('fundraisers.create.step1');
    })->name('fundraisers.create');

    Route::get('/fundraisers/create/step2', function () {
        return view('fundraisers.create.step2');
    })->name('fundraisers.create.step2');

    Route::get('/fundraisers/create/step3', function () {
        return view('fundraisers.create.step3');
    })->name('fundraisers.create.step3');

    Route::get('/fundraisers/create/step4', function () {
        return view('fundraisers.create.step4');
    })->name('fundraisers.create.step4');

    Route::get('/fundraisers/success', function () {
        return view('fundraisers.create.success');
    })->name('fundraisers.success');
});

require __DIR__.'/auth.php';
