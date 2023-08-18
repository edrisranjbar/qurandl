<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'processLogin']);
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', function () {
        return view('index');
    });
});
