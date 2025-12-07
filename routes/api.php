<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

// Public API endpoints
Route::get('/hospitals', [HospitalController::class, 'apiIndex']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Dashboard stats (AJAX endpoint)
    Route::get('/dashboard/stats', [DashboardController::class, 'getStats']);

    // Recent activity (AJAX endpoint)
    Route::get('/dashboard/activity', [DashboardController::class, 'getActivity']);

    // Notification count (AJAX endpoint)
    Route::get('/notifications/count', [NotificationController::class, 'getUnreadCount']);
});
