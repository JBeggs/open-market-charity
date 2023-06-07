<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

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



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::any('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/guest-login', [GuestController::class, 'login'])
    ->middleware(['throttle:guest-registration'])->name('guest-login');


Route::middleware(['auth'])->group(function () {

    Route::get('profile/details',[ProfileController::class,'index'])->name('profile.index');
    Route::post('profile/{user}',[ProfileController::class,'update'])->name('profile.update');
    Route::get('profile/change-password',[ProfileController::class,'change_password'])->name('profile.change-password');
    Route::any('profile/change-password-post',[ProfileController::class,'change_password_post'])->name('profile.change-password-post');

    Route::get('profile/delete-profile',[ProfileController::class,'delete_profile'])->name('profile.delete-profile');

    Route::resource('product', ProductController::class);

    Route::any('/destroy_image', [ProductController::class, 'destroy_image'])->name('destroy_image');
    Route::any('/destroy_image_content', [ContentController::class, 'destroy_image_content'])->name('destroy_image_content');
    Route::any('category/create', [CategoryController::class, 'createCategory'])->name('create-category');
    Route::get('/categories/{slug}',  [CategoryController::class, 'input'])->name('input-category');

    Route::resource('content', ContentController::class);
    Route::any('slot/create', [SlotController::class, 'createSlot'])->name('create-slot');
    Route::get('/slot/{slug}',  [SlotController::class, 'input'])->name('input-slot');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

});

Auth::routes();