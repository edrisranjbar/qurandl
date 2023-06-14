<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('admin/login/resetPassword', [AdminAuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
});
