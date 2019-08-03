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
Route::get('/', 'HomeController@index')->name('front.homepage');

Route::get('/categories/{id}', 'CategoryController@categories')->name('front.categories');
Route::get('/products/{id}', 'ProductsController@index')->name('front.products');
Route::get('/product/{id}', 'ProductsController@product')->name('front.product');

Route::get('/contact', 'ContactController@contact')->name('front.contact');
Route::post('contact', 'ContactController@contact_post');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@signin')->name('admin.signin');
    Route::post('/', 'Admin\AdminController@signin_post');

    Route::get('/signup', 'Admin\AdminController@signup')->name('admin.signup');
    Route::post('/signup', 'Admin\AdminController@signup_post');
    Route::get('/logout', 'Admin\AdminController@logout')->name('admin.logout');
    Route::get('/homepage', 'Admin\HomepageController@index')->name('admin.homepage');
});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'category'], function () {
        Route::match(['get', 'post'], '/', 'Admin\CategoryController@index')->name('admin.category');
        Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('/create', 'Admin\CategoryController@create_post');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::post('/edit/{id}', 'Admin\CategoryController@edit_post');
        Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
    });
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', 'Admin\CompanyController@form')->name('admin.company_detail');
        Route::post('/', 'Admin\CompanyController@form_post');
    });
    Route::group(['prefix' => 'upcategory'], function () {
        Route::match(['get', 'post'], '/', 'Admin\UpCategoryController@index')->name('admin.upcategory');
        Route::get('/create', 'Admin\UpCategoryController@create')->name('admin.upcategory.create');
        Route::post('/create', 'Admin\UpCategoryController@create_post');
        Route::get('/edit/{id}', 'Admin\UpCategoryController@edit')->name('admin.upcategory.edit');
        Route::post('/edit/{id}', 'Admin\UpCategoryController@edit_post');
        Route::get('/delete/{id}', 'Admin\UpCategoryController@delete')->name('admin.upcategory.delete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::match(['get', 'post'], '/', 'Admin\ProductController@index')->name('admin.product');
        Route::get('/create', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('/create', 'Admin\ProductController@create_post');
        Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('/edit/{id}', 'Admin\ProductController@edit_post');
        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::match(['get', 'post'], '/', 'Admin\UserController@index')->name('admin.user');
        Route::get('/update/{id}', 'Admin\UserController@form')->name('admin.user.update');
        Route::post('/save/{id}', 'Admin\UserController@save')->name('admin.user.save');
        Route::get('/delete/{id}', 'Admin\UserController@delete')->name('admin.user.delete');
        Route::get('/detail', 'Admin\UserController@user_detail_get')->name('admin.user.detail');
        Route::post('/detail', 'Admin\UserController@user_detail_post');
    });
});



