<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('admin/dashboard', [AdminController::class, 'create'])
                ->middleware(['auth:admin'])
                ->name('admin.dashboard');  

Route::get('admin/login', [AdminAuthenticatedSessionController::class, 'create'])
                ->middleware('guest:admin')
                ->name('admin.login');

Route::post('admin/login', [AdminAuthenticatedSessionController::class, 'store'])
                ->middleware('guest:admin');

Route::post('admin/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:admin')
                ->name('admin.logout');