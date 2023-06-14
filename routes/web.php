<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('admin/login/resetPassword', [AdminAuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::get('admin/login/resetPasswordLinkSent', [AdminAuthController::class, 'showResetPasswordLinkSent'])->name('password.resetLinkSent');
Route::get('admin/login/forgotPassword', [AdminAuthController::class, 'forgotPassword'])->name('admin.forgotPassword');
Route::patch('admin/resetPassword', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
Route::post('admin/login/forgotPassword', [AdminAuthController::class, 'processForgotPassword']);
Route::post('admin/login', [AdminAuthController::class, 'processLogin']);
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('profile', [AdminProfileController::class, 'show'])->name('admin.profile');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', function () {
        return view('index');
    });
});
