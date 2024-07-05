<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\backend\RolePermissionController;
use App\Http\Controllers\Backend\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('backend')->name('backend.')->middleware(['auth', 'check_user_type:backend'])->group(function() {
    Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/edit', [BackendController::class, 'profileEdit'])->name('profile.edit');
    Route::get('/profile/setting', [BackendController::class, 'profileSetting'])->name('profile.setting');
    // Role & Permission
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role-permission', RolePermissionController::class);
    // Setting
    Route::get('default/setting', [SettingController::class, 'defaultSetting'])->name('default.setting');
    Route::post('default/setting/update', [SettingController::class, 'defaultSettingUpdate'])->name('default.setting.update');
    Route::get('seo/setting', [SettingController::class, 'seoSetting'])->name('seo.setting');
    Route::post('seo/setting/update', [SettingController::class, 'seoSettingUpdate'])->name('seo.setting.update');
    Route::get('mail/setting', [SettingController::class, 'mailSetting'])->name('mail.setting');
    Route::post('mail/setting/update', [SettingController::class, 'mailSettingUpdate'])->name('mail.setting.update');
    Route::get('sms/setting', [SettingController::class, 'smsSetting'])->name('sms.setting');
    Route::post('sms/setting/update', [SettingController::class, 'smsSettingUpdate'])->name('sms.setting.update');
    // Employee
    Route::resource('employee', EmployeeController::class);
    Route::get('employee-trash', [EmployeeController::class, 'trash'])->name('employee.trash');
    Route::get('employee/restore/{id}', [EmployeeController::class, 'restore'])->name('employee.restore');
    Route::get('employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::get('employee/status/{id}', [EmployeeController::class, 'status'])->name('employee.status');
    // User
    Route::get('user', [BackendController::class, 'userList'])->name('user.index');
    Route::get('user/show/{id}', [BackendController::class, 'userView'])->name('user.show');
    Route::get('user/edit/{id}', [BackendController::class, 'userEdit'])->name('user.edit');
    Route::put('user/update/{id}', [BackendController::class, 'userUpdate'])->name('user.update');
    Route::delete('user/destroy/{id}', [BackendController::class, 'userDestroy'])->name('user.destroy');
    Route::get('user/trash', [BackendController::class, 'userTrash'])->name('user.trash');
    Route::get('user/restore/{id}', [BackendController::class, 'userRestore'])->name('user.restore');
    Route::get('user/delete/{id}', [BackendController::class, 'userDelete'])->name('user.delete');
});
