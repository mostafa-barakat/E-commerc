<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;

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

Route::get('/' , [HomeController::class , 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect' , [HomeController::class , 'redirect'])->middleware('auth' , 'verified');


Route::get('View_catagory' , [AdminController::class , 'View_catagory'])->name('admin.View_catagory');
Route::post('add_catagory' , [AdminController::class , 'add_catagory_data'])->name('admin.add_catagory_data');
Route::delete('View_catagory/{id}' , [AdminController::class , 'destroy'])->name('admin.destroy');


Route::get('add_product' , [AdminController::class , 'add_product'])->name('admin.add_product');
Route::post('add_product' , [AdminController::class , 'add_product_data'])->name('admin.add_product_data');


Route::get('show_product' , [AdminController::class , 'show_prodect'])->name('admin.show_product');
Route::delete('show_product/{id}' , [AdminController::class , 'destroy'])->name('admin.destroy');
Route::get('show_product/trach' , [AdminController::class , 'trach'])->name('admin.trach');
Route::get('show_product/{id}/restore' , [AdminController::class , 'restore'])->name('admin.restore');
Route::get('show_product/{id}/forcdelete' , [AdminController::class , 'forcdelete'])->name('admin.forcdelete');
Route::get('show_product/{id}/edit' , [AdminController::class , 'edit'])->name('admin.edit');


Route::get('show_order' , [AdminController::class , 'show_order'])->name('admin.show_order');


Route::get('send_email/{id}' , [AdminController::class , 'send_email'])->name('admin.send_email');
Route::post('send_user_email/{id}' , [AdminController::class , 'send_user_email'])->name('admin.send_user_email');


Route::get('search' , [AdminController::class , 'search'])->name('admin.search');






Route::get('product_details/{id}' , [HomeController::class , 'product_details'])->name('user.product_details');
Route::post('add_product/{id}' , [HomeController::class , 'add_product'])->name('product.add_card');


Route::get('card' , [HomeController::class , 'card'])->name('home.card');
Route::delete('delete_item/{id}' , [HomeController::class , 'destroy'])->name('user.destroy');


Route::get('order' , [HomeController::class , 'order'])->name('home.order');
Route::get('delete_item/{id}' , [HomeController::class , 'destroy'])->name('user.destroy');


Route::post('add_comment' , [HomeController::class , 'add_comment'])->name('user.add_comment');
Route::get('all_comments' , [HomeController::class , 'all_comments'])->name('home.all_comments');
Route::get('delete_item/{id}' , [HomeController::class , 'destroy'])->name('user.destroy');


Route::get('product_search' , [HomeController::class , 'product_search'])->name('user.product_search');


Route::get('stripe/{totil_price}' , [PaymentController::class , 'stripe'])->name('payment.stripe');
Route::post('stripe/{totil_price}',[PaymentController::class , 'stripePost'])->name('stripe.post');




