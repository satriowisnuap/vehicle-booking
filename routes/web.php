<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\BookingController as AdminBooking;
use App\Http\Controllers\Admin\VehicleController as AdminVehicle;
use App\Http\Controllers\Admin\DriverController as AdminDriver;
use App\Http\Controllers\Admin\VendorController as AdminVendor;
use App\Http\Controllers\Admin\FuelLogController as AdminFuelLog;
use App\Http\Controllers\Admin\ServiceScheduleController as AdminServiceSchedule;
use App\Http\Controllers\Admin\ReportController as AdminReport;

use App\Http\Controllers\Approver\DashboardController as ApproverDashboard;
use App\Http\Controllers\Approver\BookingController as ApproverBooking;
use App\Http\Controllers\Approver\HistoryController as ApproverHistory;

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
        Route::resource('bookings', AdminBooking::class);
        Route::resource('vehicles', AdminVehicle::class);
        Route::resource('drivers', AdminDriver::class);
        Route::resource('vendors', AdminVendor::class);
        Route::resource('fuel-logs', AdminFuelLog::class);
        Route::resource('service-schedules', AdminServiceSchedule::class);
        Route::resource('reports', AdminReport::class);
    });

    // APPROVER ROUTES
    Route::middleware('role:approver')->prefix('approver')->name('approver.')->group(function () {
        Route::get('/dashboard', [ApproverDashboard::class, 'index'])->name('dashboard');
        Route::resource('bookings', ApproverBooking::class);
        Route::get('/history', [ApproverHistory::class, 'index'])->name('history');
    });
});

