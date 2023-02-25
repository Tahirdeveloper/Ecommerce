<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;

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
// Route::get('admin/update',[AdminController::class,'update']);
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::post('/admin/auth', [AdminController::class, 'auth'])->name('Admin.auth');
// Route::get('/admin/update', [AdminController::class, 'update'])->name('Admin.update');
Route::group(['middleware' => 'admin_auth'], function () {
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // =================== Category Controller ================================
    Route::get('admin/category', [CategoryController::class, 'category'])->name('admin.category');
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category'])->name('admin.category.manage_category');
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category'])->name('admin.category.manage_category');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('admin.category.delete');
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status'])->name('admin.category.status');
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
    Route::get('admin/coupon', [CouponController::class, 'coupon'])->name('admin.coupon');
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon'])->name('admin.coupon.manage_coupon');
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, 'manage_coupon'])->name('admin.coupon.manage_coupon');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete_coupon'])->name('admin.coupon.delete');
    Route::get('admin/coupon', [CouponController::class, 'fetch_coupon'])->name('admin.coupon');
    Route::post('admin/coupon/view', [CouponController::class, 'insert_coupon'])->name('admin.coupon.view');
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'coupon_status'])->name('admin.coupon.status');
// =================== Size Controller ================================
Route::get('admin/size', [SizeController::class, 'size'])->name('admin.size');
Route::get('admin/size/manage_size', [SizeController::class, 'manage_size'])->name('admin.size.manage_size');
Route::get('admin/size/manage_size/{id}', [SizeController::class, 'manage_size'])->name('admin.size.manage_size');
Route::get('admin/size/delete/{id}', [SizeController::class, 'delete_size'])->name('admin.size.delete');
Route::get('admin/size', [SizeController::class, 'fetch_size'])->name('admin.size');
Route::post('admin/size/view', [SizeController::class, 'insert_size'])->name('admin.size.view');
Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'size_status'])->name('admin.size.status');
});
