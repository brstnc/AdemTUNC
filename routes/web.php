<?php

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
    return view('welcome');
});
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'Admin\AdminController@signin')->name('admin.signin');
        Route::post('/', 'Admin\AdminController@signin_post');

        Route::get('/signup', 'Admin\AdminController@signup')->name('admin.signup');
        Route::post('/signup', 'Admin\AdminController@signup_post');

        Route::group(['middleware' => ['auth']], function () {
        Route::get('/admin/homepage', 'Admin\HomepageController@index')->name('admin.homepage');
    });
});

Route::group(['prefix' => 'category'], function () {
    Route::match(['get', 'post'], '/', 'Admin\CategoryController@index')->name('admin.category');
    Route::get('/new', 'Admin\CategoryController@form')->name('admin.category.new');
    Route::get('/update/{id}', 'Admin\CategoryController@form')->name('admin.category.update');
    Route::post('/save/{id?}', 'Admin\CategoryController@save')->name('admin.category.save');
    Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
});

Route::group(['prefix' => 'user'], function () {
    Route::match(['get', 'post'], '/', 'Admin\UserController@index')->name('admin.user');
    Route::get('/update/{id}', 'Admin\UserController@form')->name('admin.user.update');
    Route::post('/save/{id}', 'Admin\UserController@save')->name('admin.user.save');
    Route::get('/delete/{id}', 'Admin\UserController@delete')->name('admin.user.delete');
    Route::get('/user/user-detail', 'Admin\UserController@user_detail')->name('admin.user.user_detail');
});
Route::group(['prefix' => 'product'], function () {
            Route::match(['get', 'post'], '/', 'Admin\ProductController@index')->name('admin.product');
            Route::get('/new', 'Admin\ProductController@form')->name('admin.product.new');
            Route::get('/update/{id}', 'Admin\ProductController@form')->name('admin.product.update');
            Route::post('/save/{id?}', 'Admin\ProductController@save')->name('admin.product.save');
            Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
        });




//Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//    Route::redirect('/', 'admin/signin');
//    Route::match(['get','post'],'/signin', 'AuthController@signin')->name('admin.signin');
//    Route::get('/logout', 'AuthController@logout')->name('admin.logout');
//    Route::group(['middleware' => 'admin'], function () {
//        Route::get('/homepage', 'HomePageController@index')->name('admin.homepage');
//
//        Route::group(['prefix' => 'user'], function () {
//            Route::match(['get', 'post'], '/', 'UserController@index')->name('admin.user');
//            Route::get('/update/{id}', 'UserController@form')->name('admin.user.update');
//            Route::post('/save/{id}', 'UserController@save')->name('admin.user.save');
//            Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
//        });
//
//
//        Route::group(['prefix' => 'order'], function () {
//            Route::match(['get', 'post'], '/', 'OrderController@index')->name('admin.order');
//            Route::get('/new', 'OrderController@form')->name('admin.order.new');
//            Route::get('/update/{id}', 'OrderController@form')->name('admin.order.update');
//            Route::post('/save/{id}', 'OrderController@save')->name('admin.order.save');
//            Route::get('/delete/{id}', 'OrderController@delete')->name('admin.order.delete');
//        });
//    });
//});
