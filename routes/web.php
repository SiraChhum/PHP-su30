<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\dashboardController;
use App\Http\Controllers\Backend\employeeController;


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
	Route::controller(DashboardController::class)->group(function () {
		Route::get('/', 'index')->name('dashboard.index');
	});

	Route::controller(EmployeeController::class)->group(function () {
		Route::get('/employee', 'index')->name('employee.index');
	});


