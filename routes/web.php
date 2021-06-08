<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', [TeamController::class, 'create'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/dashboard/update-member', [TeamController::class, 'updateMember'])
    ->middleware(['auth'])
    ->name('dashboard.update-member');

Route::get('/dashboard/upload-file', [FileController::class, 'create'])
    ->middleware(['auth'])
    ->name('dashboard.upload-file');

Route::post('/dashboard/upload-file', [FileController::class, 'store'])
    ->middleware(['auth'])
    ->name('dashboard.upload-file');

Route::post('/dashboard/download-file', [FileController::class, 'download'])
    ->middleware(['auth:admin'])
    ->name('dashboard.download-file');

Route::post('/dashboard/verify', [TeamController::class, 'verify'])
    ->middleware(['auth:admin'])
    ->name('dashboard.verify');

Route::post('/dashboard/decline', [TeamController::class, 'decline'])
    ->middleware(['auth:admin'])
    ->name('dashboard.decline');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';