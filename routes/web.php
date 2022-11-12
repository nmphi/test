<?php

use Illuminate\Support\Facades\Route;




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

/*Route::get('/', function (\App\Services\Product\ProductServiceInterface $ProductRepository) {
    //return \App\Models\Product::find(1)->product_image;
    return $ProductRepository->find(3);
});*/


// Route::get('/',function(){
//     return view('front.shop.index');
// })

// admin
// Route::prefix('admin')->group(function(){
//     Route::resource('user', App\Http\Controllers\Admin\UserController::class);
//     Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
// });

//Admin
Route::prefix('admin')->group(function(){
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);

});

// Client
Route::prefix('shop')->group(function(){
    Route::get('/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'show']);
    Route::post('/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'postComment']);
    Route::get('', [App\Http\Controllers\Front\ShopController::class, 'index']);

});

Route::prefix('account')->group(function(){ 
    Route::get('/login-register', [App\Http\Controllers\Front\AccountController::class, 'login']);
    Route::post('/login-register', [App\Http\Controllers\Front\AccountController::class, 'checkLogin']);
});


