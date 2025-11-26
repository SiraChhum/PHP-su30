<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');

// });
// Route::get('/home', function () {
//     return view('home');

// });
// Route::get('/', [homeController::class, 'index']);
// Route::get('/home', [PagesController::class, 'home']);
// Route::get('/about', [PagesController::class, 'about']);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/service', [ServiceController::class, 'service'])->name('service');

Route::get('/product', [ProductController::class, 'product'])->name('product');
