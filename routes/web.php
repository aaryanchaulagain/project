<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;


/*
|-----------------------------------
| Public Pages
|-----------------------------------
*/
Route::view('/', 'pages.home');
Route::view('/about', 'pages.about');
Route::get('/dog', [RoomController::class, 'servicePage'])->name('service.rooms');

Route::view('/login', 'pages.log')->name('login');
Route::view('/register', 'pages.register')->name('register');

/*
|-----------------------------------
| Registration
|-----------------------------------
*/
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

/*
|-----------------------------------
| Login
|-----------------------------------
*/
Route::post('/login', [SigninController::class, 'signin'])->name('user.signin');
Route::post('/logout', [SigninController::class, 'logout'])->name('logout');

/*
|-----------------------------------
| Protected Dashboards
|-----------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/owner/dashboard', function () {
        return view('owner.dashboard');
    })->name('owner.dashboard');

    Route::get('/tenant/dashboard', function () {
        return 'Tenant Dashboard';
    })->name('tenant.dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Owner room upload
    Route::get('/owner/room/create', [RoomController::class, 'create'])->name('owner.room.create');
    Route::post('/owner/room/store', [RoomController::class, 'store'])->name('owner.room.store');
    Route::get('/owner/profile/{id}', [OwnerController::class, 'create'])->name('owner.profile.create');
    Route::post('/owner/profile', [OwnerController::class, 'saveExtra'])->name('owner.save');

    // Owner view rooms
    Route::get('/owner/rooms', [RoomController::class, 'index'])->name('owner.room.index');

    //room status
    Route::get('/owner/rooms/status', [RoomController::class, 'status'])->name('owner.room.status');

    // Edit room
    Route::get('/owner/room/{id}/edit', [RoomController::class, 'edit'])->name('owner.room.edit');
    Route::put('/owner/room/{id}', [RoomController::class, 'update'])->name('owner.room.update');

        // Delete room
    Route::delete('/owner/room/{id}', [RoomController::class, 'destroy'])->name('owner.room.destroy');

});
/*
|-----------------------------------
| admin Dashboards
|-----------------------------------
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::post('/admin/room/{id}/approve', [AdminController::class, 'approveRoom'])
        ->name('admin.room.approve');

    Route::delete('/admin/room/{id}', [AdminController::class, 'deleteRoom'])
        ->name('admin.room.delete');
});

