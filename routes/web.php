<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Password\Generate;
use App\Http\Controllers\User\Password\PasswordController;
use App\Http\Controllers\User\Password\Reset;
use Laravolt\Platform\Enums\Permission;

Route::redirect('/', 'auth/login');

Route::middleware(['auth', 'verified'])
    ->group(
        function () {
            Route::get('/home', Home::class)->name('home');

            // Schedule
            Route::resource('monitor', MonitorController::class)->only('index');

            Route::middleware('can:'.Permission::MANAGE_USER)
            ->group(
                function () {
                    Route::resource('users', UserController::class)->except('show');
                    Route::resource('account', AccountController::class)->only('edit', 'update');
                    Route::resource('password', PasswordController::class)->only('edit');
                    Route::post('password/{id}/reset', Reset::class)->name('password.reset');
                    Route::post('password/{id}/generate', Generate::class)->name('password.generate');
                }
            );
        }
    );
    
include __DIR__ . '/auth.php';
include __DIR__ . '/my.php';
