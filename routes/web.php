<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ScheduleController;
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

            // Attendance
            Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
            Route::get('attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
            Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');

            // Schedule
            Route::resource('schedule', ScheduleController::class)->only('index', 'create');
            Route::post('schedule/import_excel',[ScheduleController::class,'import_excel'])->name('schedule.import_excel');

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
