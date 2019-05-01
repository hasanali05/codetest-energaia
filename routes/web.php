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



Route::prefix('user')->group(function()
{
	Route::middleware('auth:web')->group(function(){
        Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
		Route::get('/', 'UserController@index')->name('user.index');

       	Route::resource('inventories','InventoryController');
       	Route::resource('products','ProductController');
		Route::get('/pendingSupplies', 'UserController@pendingSupplies')->name('user.pendingSupplies');
		Route::get('/supplyReceive/{supply}', 'UserController@supplyReceive')->name('user.supplyReceive');
		Route::get('/supplyCancel/{supply}', 'UserController@supplyCancel')->name('user.supplyCancel');
		
	});   

	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('user.login');
	Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

	Route::get('/{asdf}', 'HomeController@page404');
});


Route::prefix('supplier')->group(function()
{
	Route::middleware('auth:supplier')->group(function(){
        Route::get('/dashboard', 'SupplierController@dashboard')->name('supplier.dashboard');
		Route::get('/', 'SupplierController@index')->name('supplier.index');

       	Route::get('pendingSupply','SupplierController@pendingSupply')->name('supplier.pendingSupply');
       	Route::get('allSupply','SupplierController@allSupply')->name('supplier.allSupply');
       	Route::get('addSupply','SupplierController@addSupply')->name('supplier.addSupply');
       	Route::post('addSupply','SupplierController@storeSupply')->name('supplier.store');
	});
	Route::get('/login', 'Auth\SupplierLoginController@showLoginForm')->name('supplier.login');
	Route::post('/login', 'Auth\SupplierLoginController@login');
    Route::post('/logout', 'Auth\SupplierLoginController@supplierLogout')->name('supplier.logout'); 

	Route::get('/{asdf}', 'HomeController@page404');
});

    
Route::get('/', 'HomeController@index')->name('pages.home');
Route::get('/{asdf}', 'HomeController@page404')->name('page404');
