<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Routing\Router;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth'])->group(function()
    {
            Route::prefix('admin')->group(function(){
                Route::get('/', [MainController::class, 'index'])->name('admin');
                Route::get('main', [MainController::class, 'index']);
                Route::get('/logout', [MainController::class, 'logout'])->name('logout');

             #Menu
            Route::prefix('menus')->group(function () {
                Route::get('add',  [MenuController::class, 'create']);
                Route::post('add',  [MenuController::class, 'store']);
                Route::get('list',  [MenuController::class, 'index']);
                Route::get('edit/{menu}',  [MenuController::class, 'show']);
                Route::post('edit/{menu}',  [MenuController::class, 'update']);
                Route::DELETE('destroy',  [MenuController::class, 'destroy']);
        }); 

            #Product
            Route::prefix('products')->group(function () {
                Route::get('add',[ProductController::class, 'create']);
                Route::post('add',[ProductController::class, 'store']);
                Route::get('list',[ProductController::class, 'index']); 
                Route::get('edit/{product}',[ProductController::class, 'show']); 
                Route::post('edit/{product}',[ProductController::class, 'update']); 
                Route::DELETE('destroy',  [ProductController::class, 'destroy']);
        });

           #Upload
            Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

            #Cart
            Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
            Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);

            #Slider
            Route::prefix('sliders')->group(function () {
                Route::get('add',[SliderController::class, 'create']);
                Route::post('add',[SliderController::class, 'store']);
                Route::get('list',[SliderController::class, 'index']); 
                Route::get('edit/{slider}',[SliderController::class, 'show']); 
                Route::post('edit/{slider}',[SliderController::class, 'update']); 
                Route::DELETE('destroy',  [SliderController::class, 'destroy']);
        });
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('/search', [App\Http\Controllers\MenuController::class, 'search']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::post('update-cart', [CartController::class, 'update']);
Route::get('carts/delete/{id}', [CartController::class, 'remove']);
Route::post('carts', [CartController::class, 'addCart']);

Route::get('blog', [BlogController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
Route::get('contact', [ContactController::class, 'index']);










