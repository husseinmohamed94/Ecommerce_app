<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VisitorController;
use App\Http\Livewire\Order;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

/*Route::get('/', function () {
    return view('welcome2');
});*/

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
    Route::get('/',[VisitorController::class,'index']);
    Route::get('/showCateogry/{id}',[VisitorController::class,'showCateogry'])->name('showCateogry');
    Route::get('/showsubCateogry/{id}',[VisitorController::class,'showsubCateogry'])->name('showsubCateogry');
   Route::post('/add-to-cart',[CartController::class,'AddProduct']);
    Route::resource('Visitor',VisitorController::class);
    Route::resource('Cart',CartController::class);

    Route::resource('order',OrderController::class);
 //   Route::view('checkorder',Order::class)->name('checkorder');
});
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Admin', [App\Http\Controllers\HomeController::class, 'Admin'])->name('Admin');
Route::resource('catrgory',CategoryController::class);
*/
/*Route::middleware(['Admin'])->group(function () {
    Route::resource('catrgory',CategoryController::class);

    });

*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    //Route::get('/Admin', [App\Http\Controllers\HomeController::class, 'Admin'])->name('Admin');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::middleware(['Admin'])->group(function () {
        Route::resource('catrgory',CategoryController::class);
        Route::resource('SubCategory',SubCategoryController::class);
        Route::resource('Users',UsersController::class);
        Route::post('user/admin/{id}', [UsersController::class, 'admin'])->name('user.admin');

        Route::resource('slide',SlideShowController::class);
        Route::resource('Product',ProductController::class);
        Route::get('get_subcatogry/{id}',[ProductController::class,'get_subcatogry']);
    });

});



/*
Route::get('/Admin', [App\Http\Controllers\HomeController::class, 'Admin'])->name('Admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('catrgory',CategoryController::class);
*/
