<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AdduserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register
    Route::get('/register', [AdduserController::class, 'showRegister'])->name('register');
    Route::post('/register', [AdduserController::class, 'register'])->name('register.store');

    // Forgot Password
    Route::get('/password/request', [ResetPasswordController::class, 'requestForm'])->name('password.request');
    Route::post('/password/email', [ResetPasswordController::class, 'sendResetLink'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'resetForm'])->name('password.reset');
    Route::post('/password/update', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

/*
|--------------------------------------------------------------------------
| Authenticated Users (NOT necessarily verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Email Verification Notice
    Route::get('/email/verify', function () {
        return view('verify-email');
    })->name('verification.notice');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Verification link sent!');
    })->middleware('throttle:2,1')->name('verification.send');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Verified Users Only
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile & Settings
    Route::get('/editprofile', [ProfileController::class, 'profile'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::view('/aboutus', 'aboutus')->name('aboutus');
    Route::view('/contact', 'contact')->name('contact');
    Route::view('/setting', 'setting')->name('setting');
    Route::view('/profile', 'profile')->name('profile');

    // Messages
    Route::get('/messages', [MessageController::class, 'inbox'])->name('messages.inbox');

    // Notifications (fixed duplicate)
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    // Settings
    Route::put('/settings/profile', [SettingController::class, 'updateProfile'])->name('settings.updateProfile');
    Route::put('/settings/updatePassword', [SettingController::class,'updatePassword'])->name('settings.updatePassword');
});

/*
|--------------------------------------------------------------------------
| Email Verification Callback
|--------------------------------------------------------------------------
*/
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard')->with('success', 'Your email has been verified!');
})->middleware(['auth', 'signed'])->name('verification.verify');

/*
|--------------------------------------------------------------------------
| Other Routes
|--------------------------------------------------------------------------
*/
Route::get('/search', [SearchController::class, 'search'])->name('search');
