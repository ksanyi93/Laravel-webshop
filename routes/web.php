<?php

use App\Http\Controllers\EnterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\ElsoMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KosarController;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'products'])->name('products_home');
Route::get('/enter', [UserController::class, 'enter'])->name('enter');
Route::post('/enter', [EnterController::class, 'enter'])->name('afterenter');
Route::get('/checkout', function(){
    return view('checkout', [
        'payment_methods'=>PaymentMethod::get(),
        'shipping_methods'=>ShippingMethod::get()
    ]);
});
Route::post('/checkout', [KosarController::class, 'checkout'])->name('checkout');

Route::get('/order_summary', function(){
    return view('order_summary', [
        'payment_method'=>PaymentMethod::find(Session::get('payment_method')),
        'shipping_method'=>ShippingMethod::find(Session::get('shipping_method'))
    ]);
});

Route::post('/order', [KosarController::class, 'ordered']);
Route::get('/order_completed', function(){
    return view('order_completed');
})->name('order_completed');



Route::get('/check_user_status', function(){
    
    if(Auth::check()){
        return redirect('checkout');
    }
    else{

        Session::put('redirecturl', 'checkout');

        return redirect('enter');
    }
});

Route::get('/payment_info', [KosarController::class, 'show_payment_info'])->name('payment_info');
Route::get('/shipping_info', [KosarController::class, 'show_shipping_info'])->name('shipping_info');


/* Route::get('/cart', [KosarController::class, 'show_cart'])->name('cart');
Route::get('/kosar', [KosarController::class, 'show_cart'])->name('kosar'); */
//csak egy nézetet add vissza,semmi mást!!

//--------------------------------------------------------------------------------------------------------------------------------

/* Route::post('/put_into_cart', [KosarController::class, 'put_into_cart']);
Route::post('/update/shoppingcart/qtty', [KosarController::class, 'update_shoppingcart_qtty'])->name('update_shoppingcart_qtty');
Route::post('/delete/shoppingcart/qtty', [KosarController::class, 'delete_item'])->name('delete_item'); */
//kossáral kapcsolatos műveletek!!


Route::group(['middleware'=>['empty_cart'],'namespace'=>'App\Http\Controllers'], function(){

    Route::get('/cart', 'KosarController@show_cart')->name('cart');

    Route::post('/update/shoppingcart/qtty', 'KosarController@update_shoppingcart_qtty');

    Route::post('/delete/shoppingcart', 'KosarController@delete_item');
});


Route::post('/put_into_cart', [KosarController::class, 'put_into_cart']);



















Route::group(['prefix'=>'profile' ,'middleware'=>['auth'], 'namespace'=>'\App\Http\Controllers'], 
function(){

    Route::get('/user1', 'PageController@user1');

    Route::get('/user2', 'PageController@user2');

    Route::get('/user3', 'PageController@user3');
});


Route::group(['middleware'=>['guest'], 'namespace'=>'\App\Http\Controllers'], 
function(){

    Route::get('/vendeg1', 'PageController@vendeg1');

    Route::get('/vendeg2', 'PageController@vendeg2');

    Route::get('/vendeg3', 'PageController@vendeg3');
});



Route::group(['middleware'=>[ElsoMiddleware::class], 'namespace'=>'\App\Http\Controllers'],
function(){

    Route::get('/test', 'PageController@test');
});










Route::get('/home', '\App\Http\Controllers\PageController@showpage');
                    //[PageController::class, 'contact'] --------->rövidebb elérési útvonal definiálása

Route::get('/contact', function(){
    return view('contact');
});

Route::post('/contact', [PageController::class, 'contact']);

Route::get('/users', [PageController::class, 'users']);



