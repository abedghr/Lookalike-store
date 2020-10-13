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

Route::get('/', function () {
    return view('public_views.index');
})->name('index');



Auth::routes();

// Login Routes

Route::get('/home', 'HomeController@index')->name('home');





Route::group(['middleware' => ['admin']], function () {

    // Admin Routes

    route::get('/admin/create','AdminController@create')->name('admins.create');
    route::post('/admin','AdminController@store')->name('admins.store');
    route::get('/admin/{id}/edit','AdminController@edit')->name('admins.edit');
    route::delete('/admins/{id}','AdminController@destroy')->name('admins.destroy');
    route::put('/admin/{id}','AdminController@update')->name('admins.update');
    Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route');

    // Category Routes 

    route::get('/category/create','CategoryController@create')->name('categories.create');
    route::post('/category','CategoryController@store')->name('categories.store');
    route::get('/category/{id}/edit','CategoryController@edit')->name('categories.edit');
    route::put('/category/{id}','CategoryController@update')->name('categories.update');
    route::delete('/category/{id}','CategoryController@destroy')->name('categories.destroy');

    // Products Routes

    route::get('/products/create','ProductController@create')->name('products.create');
    route::post('/products','ProductController@store')->name('products.store');
    route::get('/products/{id}/edit','ProductController@edit')->name('products.edit');
    route::put('/products/{id}','ProductController@update')->name('products.update');
    route::delete('/products/{id}','ProductController@destroy')->name('products.destroy');

    // Related Routes 


    route::get('/related/create','RelatedController@create')->name('related.create');
    route::post('/related','RelatedController@store')->name('related.store');
    route::get('/related/{id}/edit','RelatedController@edit')->name('related.edit');
    route::put('/related/{id}','RelatedController@update')->name('related.update');
    route::delete('/related/{id}','RelatedController@destroy')->name('related.destroy');


});


// Public Routes

Route::get('/','PublicCategoryController@index')->name('category.index');
Route::get('/single_category/{id}','PublicCategoryController@show')->name('categories.show');
Route::get('/single_product/{id}','PublicProductController@show')->name('products.show');
Route::get('/products','PublicProductController@all')->name('products.all');

// Contact-us Routes
Route::get('/contact-us','PublicFeedbackController@index')->name('contact-us');
Route::post('/contact-us','PublicFeedbackController@store')->name('feedbacks.store');

Route::post('/addtocart','CartController@addtocart')->name('addtocart');
Route::get('/addtocart/{prodId}','CartController@quickaddtocart')->name('quickaddtocart');
Route::get('/removefromcart/{id}','CartController@removeFromCart')->name('cart.remove');
Route::get('/shoppingcart','CartController@shoppingcart')->name('shoppingcart');


// Orders Routes

Route::get('/checkout','CartController@checkout')->name('checkout');
Route::post('/orders/create','PublicOrderController@create')->name('orders.create');
Route::get('/orders','OrderController@index')->name('orders.index');
Route::get('/show_order/{products}','OrderController@show')->name('orders.show');
Route::get('/accept_order','OrderController@accept')->name('orders.accept');
Route::get('/decline_order','OrderController@decline')->name('orders.decline');
Route::get('/delivery_process_order','OrderController@delivery_process')->name('orders.delivery_process');
Route::get('/received_order','OrderController@received_order')->name('orders.received');
Route::get('/unreceived_order','OrderController@unreceived_order')->name('orders.unreceived');
Route::get('/order_done','PublicOrderController@orderDone')->name('orders.done');


