<?php

use App\Http\Controllers\Role_and_Permisson_controller;
use App\Http\Controllers\back_office\Category_controller;
use App\Http\Controllers\back_office\Dashboard_controller;
use App\Http\Controllers\back_office\Product_controller;
use App\Http\Controllers\back_office\Sales_controller;
use App\Http\Controllers\frontend\Cart_controller;
use App\Http\Controllers\frontend\Checkout_controller;
use App\Http\Controllers\frontend\Home_controller;
use Illuminate\Support\Facades\Route;


//home page
Route::resource('/',Home_controller::class);  


//admin & operation manager
Route::group(['middleware' => ['role:admin|operation_manager','auth:sanctum']], function () {
   
    Route::resource('category',Category_controller::class);
    Route::resource('product',Product_controller::class);  

});


//sales_manager
Route::group(['middleware' => ['role:sales_manager','auth:sanctum']], function () {
   
    Route::resource('sales',Sales_controller::class);
});


//admin panel commen routes
Route::group(['middleware' => ['role:admin|operation_manager|sales_manager','auth:sanctum']], function () {
   
    Route::resource('admin',Dashboard_controller::class); 
});
 

//public users routes (authenicated)

Route::group(['middleware' => ['auth:sanctum']], function () {
   
   
    Route::get('/cart-data',[Cart_controller::class, 'cartload']);
    Route::post('/delete-from-user-cart',[Cart_controller::class, 'deletefromusercart']);
    Route::get('/checkout', [Checkout_controller::class, 'usercheckout']);
    

});

//public  routes
Route::get('/categories/{id}', [Home_Controller::class, 'findcategory']);
Route::get('/products/{id}', [Home_Controller::class, 'product_view']);
Route::get('/quick-add-to-cart/{id}', [Cart_controller::class, 'quic_add_to_cart']);
Route::post('/addtocart', [Cart_controller::class, 'addtocart']);

//roles and permisson create (hard coded)
Route::get('/run-role-and-permisson', [Role_and_Permisson_controller::class, 'run_commands'])->name('run'); 


