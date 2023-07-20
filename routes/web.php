<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Products;
use App\Http\Controllers\Brands;
use App\Http\Controllers\Users;
use App\Http\Controllers\Attributes;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Settings;
use App\Http\Controllers\Banners;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypes;
use App\Http\Controllers\Websites;
use Inertia\Inertia;
use App\Models\Setting;
use App\Http\Controllers\SalonpeWeb;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Catalog;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MyAccount;
use App\Http\Controllers\Orders;
use App\Http\Controllers\RazorpayController;
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


Route::get('/', [SalonpeWeb::class , 'landing'])->name("salonpe.index");
Route::get('/about-us', [ SalonpeWeb::class ,'aboutUs'])->name("salonpe.aboutus");
Route::get('/contact-us',[ SalonpeWeb::class , 'contactUs'])->name("salonpe.contactus");
Route::get('/store',[ SalonpeWeb::class , 'store'])->name("salonpe.store");
Route::get('/product/detail/{product}', [SalonpeWeb::class , 'productDetail'])->name("salonpe.product.detail");

Route::get('/wishlist', function () {    return Inertia::render("Web/Wishlist"); })->name("salonpe.wishlist");
Route::get('/account-dashboard',[MyAccount::class , 'dashboard'])->name("salonpe.account.dashboard");
Route::get('/account-orders',[MyAccount::class , 'orders'])->name("salonpe.account.order");
Route::get('/account-addresses',[MyAccount::class , 'addresses'])->name("salonpe.account.addresses");
Route::get('/account-detail',[MyAccount::class , 'detail'])->name("salonpe.account.detail");
Route::get('/account-payment-method',[MyAccount::class , 'paymentMethod'])->name("salonpe.account.payment.method");
Route::get('/product/filter', function () {    return Inertia::render("Web/ProductFilteration"); })->name("salonpe.product.filter");






Route::get('/account-reset-password', function () {    return Inertia::render("Web/ChangePassword"); })->name("salonpe.account.change.password");

Route::resource('/product',Products::class);
Route::resource('/brand',Brands::class);
Route::resource('/user',Users::class);
Route::resource('/category',Categories::class);
Route::resource('/product-type',ProductTypes::class);
Route::resource('/attribute',Attributes::class);
Route::resource('/tag',Tags::class);
Route::resource('/setting',Settings::class);
Route::resource('/banner',Banners::class);
Route::resource('/media', MediaController::class);
Route::resource('/account',MyAccount::class);
Route::resource('/order',Orders::class);
//
Route::get('cart',[CartController::class , 'index'])->name("cart.index");
Route::post('cart',[CartController::class , 'store'])->name("cart.store");
Route::delete('cart/{id}',[CartController::class,'destroy'])->name("cart.destroy");
Route::delete('cart/items/clear',[CartController::class , 'clear'])->name("cart.clear");
Route::get('cart/checkout/detail',[CartController::class,'detail'])->name("cart.checkout.detail");
Route::get('cart/shipping/detail',[CartController::class,'shippingDetail'])->name("cart.shipping.detail");
Route::get('cart/make/payment',[CartController::class,'makePayment'])->name("cart.make.payment");
Route::post("cart/payment/handle",[RazorpayController::class,'handlePayment'])->name("cart.payment.handle");
Route::get("cart/payment/success",[RazorpayController::class,'success'])->name("cart.payment.success");

Route::post('cart/save/address',[CartController::class,'saveAddress'])->name('cart.save.address');
Route::get("/setting/edit/{type}",[Settings::class,'settingEdit'])->name("setting.edit.type");
Route::post("/setting/edit/{type}",[Settings::class,'settingStore'])->name("setting.store.type");
// 
Route::get('/sub-category',[Categories::class,'subCategoryIndex'])->name('sub.category.index');
Route::get('/sub-category/create',[Categories::class,'subCategoryCreate'])->name('sub.category.create');
Route::post('/sub-category/store',[Categories::class,'subCategoryStore'])->name('sub.category.store');
Route::get('product-attribute/{productId}',[Products::class,'createProductAttribute'])->name('create.product.attribute');
Route::get('product-attribute/{attributeId}/edit',[Products::class,'editProductAttribute'])->name('edit.product.attribute');
Route::post('product-attribute-store/{productId}',[Products::class,'storeProductAttribute'])->name('store.product.attribute');

Route::get('/dashboard', [Dashboard::class, 'dashboard'])->middleware("auth")->name('dashboard');
Route::get('/wishlist/add',[Catalog::class, 'addToWishlist'])->name("add.to.wishlist");
// 
Route::get("/website-landing", [ Websites::class , 'landing'])->name("website.page.landing");
Route::post("/store-featured-offer-selling-product",[ Websites::class, 'storeFeaturedOfferSellingProduct'])->name("storeFeaturedOfferSellingProduct");
Route::get("/remove-featured-offer-selling-product/{id}/{type}",[ Websites::class, 'removeFeaturedOfferSellingProduct'])->name("removeFeaturedOfferSellingProduct");


require __DIR__.'/auth.php';
