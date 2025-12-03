<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    // Dashboard stats (AJAX endpoint)
    Route::get('/dashboard/stats', [DashboardController::class, 'getStats']);

    // Recent activity (AJAX endpoint)
    Route::get('/dashboard/activity', [DashboardController::class, 'getActivity']);

    // Notification count (AJAX endpoint)
    Route::get('/notifications/count', [NotificationController::class, 'getUnreadCount']);
});
