<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DashboardController;

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'processLogin']);
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('profile', [AdminProfileController::class, 'show'])->name('admin.profile');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::patch('settings', [SettingController::class, 'updateAll'])->name('settings.updateAll');
    Route::resource('settings', SettingController::class);
    Route::resource('comments', CommentController::class);
    Route::patch('comments/{commentId}/reply', [CommentController::class, 'reply']);
    Route::get('comments/{commentId}/toggleApprovementStatus', [CommentController::class, 'toggleApprovementStatus']);
});
