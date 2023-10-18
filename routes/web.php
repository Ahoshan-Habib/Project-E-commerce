<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|-------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

//Backend Route
Route::get('/_admin',[AdminController::class,'index']);
Route::post('/admin-dashboard',[AdminController::class,'Show_Dashboard']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);

//All Category Routes here..........
Route::resource('/categories',CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class,'change_status']);

// ALL Sub Category Routes here..........
Route::resource('/sub-categories',SubCategoryController::class);
Route::get('/subcat-status{subcategory}',[SubCategoryController::class,'change_status']);

// ALL Brand Routes here..........
Route::resource('/brands',BrandController::class);
Route::get('/brand-status{brand}',[BrandController::class,'change_status']);

// ALL Unit Routes here..........
Route::resource('/units',UnitController::class);
Route::get('/unit-status{unit}',[UnitController::class,'change_status']);

// ALL Size Routes here..........
Route::resource('/sizes',SizeController::class);
Route::get('/size-status{size}',[SizeController::class,'change_status']);

// ALL Color Routes here..........
Route::resource('/colors',ColorController::class);
Route::get('/color-status{color}',[ColorController::class,'change_status']);

// ALL products Routes here..........
Route::resource('/products',ProductController::class);
Route::get('/product-status{product}',[ProductController::class,'change_status']);

//Oder Route here................
Route::get('/manage-order',[OrderController::class,'manage_order']);
Route::get('/view-order/{id}',[OrderController::class,'view_order']);

// Frontend Route
Route::get('/',[HomeController::class,'index']);
Route::get('/view-details{id}',[HomeController::class,'view_details']);
Route::get('/product_by_cat{id}',[HomeController::class,'product_by_cat']);
Route::get('/product_by_subcat{id}',[HomeController::class,'product_by_subcat']);
Route::get('/search',[HomeController::class,'search']);

//Add to cart Route
Route::post('/add-to-cart',[CartController::class,'add_to_cart']);
Route::get('/delete-cart/{id}',[CartController::class,'delete']);

//Checkout Route
//Route::get('/checkout',[CheckoutController::class,'index']);
Route::get('/login-check',[CheckoutController::class,'login_check']);

// Customer login,registration route
Route::post('/customer-login',[CustomerController::class,'login']);
Route::post('/customer-registration',[CustomerController::class,'registration']);
Route::get('/cus-logout',[CustomerController::class,'logout']);
//Route::post('/save-shipping-address',[CheckoutController::class,'save_shipping_address']);
//Route::get('/payment',[CheckoutController::class,'payment']);
//Route::post('/oder-place',[CheckoutController::class,'oder_place']);

// SSLCOMMERZ Start
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::get('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
