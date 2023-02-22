<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;



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
//     return view('Admin/login');
// });
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('Admin.auth');
Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // =================== Category Controller ================================
    Route::get('admin/category', [CategoryController::class, 'category'])->name('admin.category');
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category'])->name('admin.category.manage_category');
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category'])->name('admin.category.manage_category');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('admin.category.delete');
    Route::get('admin/category', [CategoryController::class, 'fetch_category'])->name('admin.category');
    Route::post('admin/category/view', [CategoryController::class, 'insert_category'])->name('admin.category.view');
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        if (session()->forget('ADMIN_ID')) {
            session()->flash("logout", "you logged out from your account");
        }
        return redirect('/');
    });
    // =================== Coupons Controller ================================
    Route::get('admin/coupons',[CouponController::class,'index']);
});
