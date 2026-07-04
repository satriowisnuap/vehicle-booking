<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Approver\DashboardController as ApproverDashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    // Profile bisa diakses admin maupun approver
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ADMIN ROUTES
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    });

    // APPROVER ROUTES
    Route::middleware('role:approver')->prefix('approver')->name('approver.')->group(function () {
        Route::get('/dashboard', [ApproverDashboard::class, 'index'])->name('dashboard');
    });
});
