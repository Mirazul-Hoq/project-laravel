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

Route::get('/','CustomerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index')->name('admin.home');
// category related route
Route::get('admin/category', 'AdminController@category')->name('category.add');
Route::post('admin/category', 'AdminController@store')->name('category.store');
Route::get('admin/category-list', 'AdminController@catList')->name('category.list');
Route::post('admin/category-delete/{id}', 'AdminController@cat_delete')->name('category.delete');
// end category

// item related route
Route::get('admin/item', 'ItemController@index')->name('item.add');
Route::post('admin/item', 'ItemController@store')->name('item.store');
Route::get('admin/item/list', 'ItemController@item_list')->name('item.list');
Route::get('admin/item/edit/{id}', 'ItemController@item_edit');
Route::post('admin/item/update/{id}', 'ItemController@update_item')->name('update.item');
Route::get('admin/item/delete/{id}', 'ItemController@delete_item')->name('delete.item');
// Route::post('admin/item/deactive/{id}', 'ItemController@item_deactive')->name('item.deactive');
// end item

Route::get('user/home', 'UserController@index')->name('user.home');
Route::get('cart/{id}','UserController@cart')->name('user.cart');
// Route::get('restaurant/home', 'RestaurantController@index')->name('restaurant.home');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('admin_reg','AdminReg\RegisterController@showAdminRegistrationForm');
Route::post('admin_reg','AdminReg\RegisterController@admin_register')->name('admin.reg');
Route::get('verify/{email}/{verifyToken}/{role}', 'AdminReg\RegisterController@sendAdminEmailDone')->name('sendAdminEmailDone');
Route::get('cart/{id}','CustomerController@cart')->name('cart');
Route::post('cart-store','CustomerController@cart_store')->name('cart.store');
Route::get('cart-store','CustomerController@cart_view')->name('cart.view');
Route::post('cart/store/delete/{id}','CustomerController@cart_store_delete');
