<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;


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
    return view('Admin/login');
});
Route::get('/login', [AdminController::class, 'index'])->name('index');
Route::get('/admin/auth', [AdminController::class, 'auth'])->name('Admin.dashboard');


Route::group(['middleware' => 'admin_auth'], function () {
Route::post('/admin/dashboard', [AdminController::class, 'auth'])->name('Admin.dashboard');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('Admin.category');
Route::get('/admin/manage_category', [CategoryController::class, 'manage_category'])->name('Admin.manage_category');

});
