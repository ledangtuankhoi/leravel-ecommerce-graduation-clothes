<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;



Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/test', 'LandingPageController@test')->name('test');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.swittchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});


// route test function
Route::get('/test/function_get', 'BlockPageController@TrendBlock')->name('test-function-get');
Route::post('/test_function_post', 'BlockPageController@NewProductByCategoryAuto')->name('test-function-post');


//test controller
Route::get('/test/clear-theme', 'TestController@clear');
Route::get('/test/set-theme/{theme}', 'TestController@settheme');



/**
 * =============================================
 * theme defautl
 * =============================================
 */

Route::prefix('/theme-default')->name('theme-default    ')->middleware('theme:default')->group(function () {


    Route::get('/', 'LandingPageController@index')->name('landing-page');
    Route::get('/test', 'LandingPageController@test')->name('test');

    Route::get('/shop', 'ShopController@index')->name('shop.index');
    Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
    Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
    Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
    Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

    Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
    Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.swittchToCart');

    Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
    Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

    Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


    Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/search', 'ShopController@search')->name('search');

    Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

    Route::middleware('auth')->group(function () {
        Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
        Route::patch('/my-profile', 'UsersController@update')->name('users.update');

        Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
        Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
    });


    // route test function
    Route::get('/test/function_get', 'BlockPageController@TrendBlock')->name('test-function-get');
    Route::post('/test_function_post', 'BlockPageController@NewProductByCategoryAuto')->name('test-function-post');


    //test controller
    Route::get('/test/clear-theme', 'TestController@clear');
    Route::get('/test/set-theme/{theme}', 'TestController@settheme');
});
