<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\PositionController;
use App\Http\Controllers\backend\widgetController;
use App\Http\Controllers\backend\formController;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employee', 'index')->name('employee.index');
    Route::get('/employee/create', 'create')->name('employee.create');
    Route::post('/employee/store', 'store')->name('employee.store');
    Route::get('/employee/show/{id}', 'show')->name('employee.show');
    Route::get('/employee/edit/{id}', 'edit')->name('employee.edit');
    Route::put('/employee/update/{id}', 'update')->name('employee.update');
    Route::get('/employee/delete/{id}', 'delete')->name('employee.delete');
    Route::delete('/employee/destroy/{id}', 'destroy')->name('employee.destroy');
});

Route::controller(widgetController::class)->group(function () {
    Route::get('/widget', 'index')->name('widget.index');
});

Route::controller(formController::class)->group(function () {
    Route::get('/form', 'index')->name('form.index');
});

Route::resource('/department', DepartmentController::class);

Route::controller(PositionController::class)->group(function () {
    Route::get('/position', 'index')->name('position.index');
    Route::get('/position/create', 'create')->name('position.create');
    Route::post('/position/store', 'store')->name('position.store');
    Route::get('/position/show/{id}', 'show')->name('position.show');
    Route::get('/position/edit/{id}', 'edit')->name('position.edit');
    Route::put('/position/update/{id}', 'update')->name('position.update');
    Route::get('/position/delete/{id}', 'delete')->name('position.delete');
    Route::delete('/position/destroy/{id}', 'destroy')->name('position.destroy');
});

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/create', [DepartmentController::class, 'create']);
Route::post('/department/store', [DepartmentController::class, 'store']);
Route::get('/department/show/{id}', [DepartmentController::class, 'show']);
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::post('/department/update/{id}', [DepartmentController::class, 'update']);
Route::delete('/department/delete/{id}', [DepartmentController::class, 'destroy']);

// 1. Route to see the confirmation page
Route::get('/department/delete/{id}', [DepartmentController::class, 'delete']);

// 2. Route to execute the deletion (The form inside delete.blade.php points here)
Route::delete('/department/destroy/{id}', [DepartmentController::class, 'destroy']);
