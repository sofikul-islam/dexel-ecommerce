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

Route::get('/','FontendController@index')->name('index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
//********************************************
//
//start routeing category
//
//
//**********************************************
Route::get('/Category/from','CategoryController@category_form')->name('category_form');
Route::post('/category/add','CategoryController@category_add')->name('category.store');
Route::get('/manage/category','CategoryController@managecategory')->name('manage_category');
Route::get('unpublish{id}','CategoryController@unpublished')->name('unpublish');
Route::get('publish{id}','CategoryController@published')->name('publish');
Route::get('/destroy{id}','CategoryController@destroy')->name('destroy');
Route::get('/edit_category{id}','CategoryController@edit_category')->name('edit_category');
Route::post('update.category{id}','CategoryController@update')->name('update.category');
//********************************************
//
//start routeing product
//
//
//**********************************************
Route::get('/add.product','ProductController@product_form')->name('product_form');
Route::post('/product.insert','ProductController@saveproduct')->name('product_save');
Route::get('/product.manage','ProductController@productmanage')->name('product_manage');
Route::get('/product_unpublish{id}','ProductController@productunpublish')->name('product_unpublish');
Route::get('/product_publish{id}','ProductController@productpublish')->name('product_publish');
Route::get('/delete{id}','ProductController@delete')->name('delete');
Route::get('/edit{id}','ProductController@edit')->name('edit');
Route::post('/product_edit_save{id}','productController@update')->name('product_edit_save');
Route::get('/restore.delete{id}','productController@restoredelete')->name('restore.delete');
Route::get('/force.delete{id}','productController@forcedelete')->name('force.delete');
Route::get('/product.deteils{id}','FontendController@productdeteils')->name('product.deteils');
Route::get('/shop.view','FontendController@shopview')->name('shop.view');
Route::get('/shop.view.category{id}','FontendController@shopcategoryview')->name('shop.view.category');
// cart route
Route::post('/add.cart','CartController@addcart')->name('add.cart');
Route::get('/remove.cart{id}','CartController@removecart')->name('remove.cart');
Route::post('/update.quantity','CartController@updatequantity')->name('update.quantity');
Route::get('/checkout.form','CartController@checkoutform')->name('checkout.form');
Route::post('/checkout.form.store','CartController@store')->name('checkout.form.store');
Route::get('/shipping.form','CartController@shippingform')->name('shipping.form');
Route::post('/shipping.store','CartController@shippingstore')->name('shipping.store');
Route::get('/payment.form','CartController@paymentform')->name('payment.form');
Route::post('/payment.store','CartController@paymentstore')->name('payment.store');
//order information route

Route::get('/order.view','OrderController@ordertable')->name('order.table');
Route::get('/order.deteils.view{id}','OrderController@orderdeteilsview')->name('order.deteils.view');
Route::get('/order.invoice.view{id}','OrderController@orderinvoiceview')->name('order.invoice.view');
Route::get('/invoice.print{id}','OrderController@invoicedownload')->name('invoice.download');
