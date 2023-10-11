<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DeletedProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('root');

Auth::routes();


// the user's frontend page
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add_to_cart');
Route::delete('remove-from-cart/{id}', [HomeController::class, 'remove'])->name('remove_from_cart');
Route::get('/showforuser', [HomeController::class, 'show'])->name('showforuser');
Route::get('get_category_products/{category}', [CategoryController::class, 'get_category_products'])->name('get_category_products');
// the end of user's frontend page



Route::post('/store_orders', [OrderController::class, 'store'])->name('store_orders');



// admin middlware
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin');


    // users
    Route::get('users/allusers', [UserController::class, 'showusers'])->name('allusers');
    Route::get('users/edituser/{id}', [UserController::class, 'edituser'])->name('edituser');
    Route::put('users/edituser/{id}/updateuser', [UserController::class, 'updateuser'])->name('updateuser');
    Route::get('users/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
    // users



    //product softdeleted
    Route::get('products/show-deleted', [ProductController::class, 'deletedproduct'])->name('deletedproduct');
    Route::delete('products.forcedelete/{id}', [ProductController::class, 'forcedelete'])->name('forcedelete');
    Route::get('products.restore/{id}', [ProductController::class, 'restore'])->name('restore');
    //product softdeleted

    //category softdeleted
    Route::get('categories/show-deleted', [CategoryController::class, 'deletedcategory'])->name('deletedcategory');
    Route::delete('categories.forcedelete/{id}', [CategoryController::class, 'forcedelete'])->name('forcedelete_category');
    Route::get('categories.restore/{id}', [CategoryController::class, 'restore'])->name('restore_category');
    //category softdcategoriesleted

    // user's orders
    Route::get('all-orders', [OrderController::class, 'allorders'])->name('all_orders');
    Route::get('user-orders/{user}', [OrderController::class, 'user_orders'])->name('user_orders');
    Route::get('filter-orders/{user}', [OrderController::class, 'filter_orders'])->name('filter_orders');
    Route::get('show-order-items/{order}', [OrderController::class, 'show_order_items'])->name('show_order_items');
    Route::delete('delete_order/{id}', [OrderController::class, 'delete_order'])->name('delete_order');
        // *** change order's status
    Route::put('orders/{order}/reject', [OrderController::class, 'reject_orders'])->name('reject');
    Route::put('orders/{order}/accept', [OrderController::class, 'accept_orders'])->name('accept');
        // *** change order's status
    Route::get('accepted-orders', [OrderController::class, 'accepted_orders'])->name('accepted_orders');
    Route::get('rejected-orders', [OrderController::class, 'rejected_orders'])->name('rejected_orders');
    Route::get('pending-orders', [OrderController::class, 'pending_orders'])->name('pending_orders');
    // user's orders


    // resouces controller
    Route::resource('products',ProductController::class);

    Route::resource('categories',CategoryController::class);
    Route::get('category-products/{category}', [CategoryController::class, 'category_products'])->name('category_products');

    Route::get('/{page}', [AdminController::class, 'page']);
    // resouces controller


});
// the end of admin middlware
