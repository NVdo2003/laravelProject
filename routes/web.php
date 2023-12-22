<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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



Route::middleware('adminsMiddleware')->get('/', function () {
    return view('Darkan.master');
});


Route::prefix('/login')->group(function (){
    Route::get('/loginadmin', [\App\Http\Controllers\AdminController::class,'loginadmin'])->name('login.loginadmin');
    Route::post('/loginProcesss', [\App\Http\Controllers\AdminController::class,'loginProcesss'])->name('login.loginProcesss');
    Route::get('/logoutt', [\App\Http\Controllers\AdminController::class,'logoutt'])->name('login.logoutt');
});

/*Route::get('/brand', function () {
    return view('brand.master');
});

Route::get('/brand', [\App\Http\Controllers\BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');
Route::post('/brand/create', [\App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/{id}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
Route::put('/brand/{id}/edit', [\App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{id}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('brand.destroy');

*/
Route::prefix('/login')->group(function (){
    Route::get('/', [\App\Http\Controllers\CustomerController::class,'login'])->name('user.login.login');
    Route::post('/loginProcess', [\App\Http\Controllers\CustomerController::class,'loginProcess'])->name('user.login.loginProcess');
    Route::get('/logout', [\App\Http\Controllers\CustomerController::class,'logout'])->name('user.login.logout');
    Route::get('/register', [\App\Http\Controllers\CustomerController::class,'hi'])->name('user.login.hi');
    Route::post('/registers', [\App\Http\Controllers\CustomerController::class,'rset'])->name('user.login.rset');

});







Route::prefix('/home')->group( function (){
    Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('user.home.index');
    Route::post('/search', [\App\Http\Controllers\HomeController::class,'searchProductByName'])->name('search');
    Route::get('/detail/{id}',[\App\Http\Controllers\HomeController::class,'detail'])->name('user.productDetail.detail');
    Route::get('/cat/{id}',[\App\Http\Controllers\HomeController::class,'cat'])->name('user.category.cat');
    Route::get('/brand/{id}',[\App\Http\Controllers\HomeController::class,'brand'])->name('user.brand.br');
    Route::get('/type/{id}',[\App\Http\Controllers\HomeController::class,'type'])->name('user.type.tp');
    Route::middleware('customersMiddleware')->get('/cart/{id}',[\App\Http\Controllers\HomeController::class,'cart'])->name('user.cart.cart');
/*    Route::get('/showCart/',[\App\Http\Controllers\HomeController::class,'showCart'])->name('home.showCart');*/
    Route::match(['get', 'post'], '/showCart', [\App\Http\Controllers\HomeController::class, 'showCart'])->name('home.showCart');
    Route::get('/delete/{id}',[\App\Http\Controllers\HomeController::class,'deleteCart'])->name('home.deleteCart');
    Route::post('/update-cart', [\App\Http\Controllers\HomeController::class, 'updateCart'])->name('home.updateCart');
    Route::post('/buy',[\App\Http\Controllers\HomeController::class,'buyNow'])->name('home.buy');
    Route::get('/cartHistory',[\App\Http\Controllers\HomeController::class,'cartHistory'])->name('user.cartHistory.history');
    Route::get('/cartDt/{order_id}',[\App\Http\Controllers\HomeController::class,'cartDt'])->name('user.cartDt.history');
    Route::post('/update-order-status{order_id}',[\App\Http\Controllers\HomeController::class,'cancelOrder'])->name('update.order.status');
    Route::get('/pversion/{id}',[\App\Http\Controllers\HomeController::class,'pversion'])->name('user.productVersion.pversion');



//    Route::middleware('customersMiddleware')->get('/cart/{id}',[\App\Http\Controllers\VersionController::class,'addToCart'])->name('user.cart.cart');
});

//Route::middleware('customersMiddleware')->prefix('/cart')->group( function (){
//    Route::get('/',[\App\Http\Controllers\HomeController::class,'cart'])->name('user.cart.cart');
//    Route::get('/cart/{id}',[\App\Http\Controllers\HomeController::class,'cart'])->name('user.cart.cart');
//});

// Category
Route::prefix('/category')->group( function (){
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.index');

    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

    Route::get('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
});


// Brand
Route::prefix('/brand')->group( function (){
    Route::get('/',[\App\Http\Controllers\BrandController::class,'index'])->name('brand.index');

    Route::get('/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');
    Route::post('/create', [\App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');

    Route::get('/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
    Route::delete('/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('brand.destroy');
});


// Admin
Route::prefix('/admins')->group( function (){
    Route::get('/',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.index');

    Route::get('/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::post('/create', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');

    Route::get('/{admin}/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{admin}/edit', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{admin}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
});


//Customer
Route::prefix('/customer')->group( function (){
    Route::get('/',[\App\Http\Controllers\CustomerController::class,'index'])->name('customer.index');

    Route::get('/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/create', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');

    Route::get('/{customer}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/{customer}/edit', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');
});


//Type
Route::prefix('/type')->group( function (){
    Route::get('/',[\App\Http\Controllers\TypeController::class,'index'])->name('type.index');

    Route::get('/create', [\App\Http\Controllers\TypeController::class, 'create'])->name('type.create');
    Route::post('/create', [\App\Http\Controllers\TypeController::class, 'store'])->name('type.store');

    Route::get('/{type}/edit', [\App\Http\Controllers\TypeController::class, 'edit'])->name('type.edit');
    Route::put('/{type}/edit', [\App\Http\Controllers\TypeController::class, 'update'])->name('type.update');
    Route::delete('/{type}', [\App\Http\Controllers\TypeController::class, 'destroy'])->name('type.destroy');
});


//PaymentMethods
Route::prefix('/paymentMethods')->group( function (){
    Route::get('/',[\App\Http\Controllers\PaymentMethodsController::class,'index'])->name('paymentMethods.index');

    Route::get('/create', [\App\Http\Controllers\PaymentMethodsController::class, 'create'])->name('paymentMethods.create');
    Route::post('/create', [\App\Http\Controllers\PaymentMethodsController::class, 'store'])->name('paymentMethods.store');

    Route::get('/{paymentMethods}/edit', [\App\Http\Controllers\PaymentMethodsController::class, 'edit'])->name('paymentMethods.edit');
    Route::put('/{paymentMethods}/edit', [\App\Http\Controllers\PaymentMethodsController::class, 'update'])->name('paymentMethods.update');
    Route::delete('/{paymentMethods}', [\App\Http\Controllers\PaymentMethodsController::class, 'destroy'])->name('paymentMethods.destroy');
});


//Products
Route::prefix('/product')->group( function (){
    Route::get('/',[\App\Http\Controllers\ProductController::class,'index'])->name('product.index');

    Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

    Route::get('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::put('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
});


//Versions
Route::prefix('/version')->group( function (){
    Route::get('/',[\App\Http\Controllers\VersionController::class,'index'])->name('version.index');

    Route::get('/create', [\App\Http\Controllers\VersionController::class, 'create'])->name('version.create');
    Route::post('/create', [\App\Http\Controllers\VersionController::class, 'store'])->name('version.store');

    Route::get('/{version}/edit', [\App\Http\Controllers\VersionController::class, 'edit'])->name('version.edit');
    Route::put('/{version}/edit', [\App\Http\Controllers\VersionController::class, 'update'])->name('version.update');
    Route::delete('/{version}', [\App\Http\Controllers\VersionController::class, 'destroy'])->name('version.destroy');
    Route::get('/{version}/details', [\App\Http\Controllers\VersionController::class, 'show'])->name('specifications.index');

});


//Orders
Route::prefix('/order')->group( function (){
    Route::get('/',[\App\Http\Controllers\OrderController::class,'index'])->name('order.index');

    Route::get('/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::post('/create', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

    Route::get('/{order}/edit', [\App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
    Route::put('/{order}/updateStatus', [\App\Http\Controllers\OrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::delete('/{order}', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/order/orderDetail/{customer_id}/{order_id}',[\App\Http\Controllers\OrderController::class,'orderDetail'])->name('orderDt.index');

});
