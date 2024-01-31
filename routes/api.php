<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1','namespace'=>'Api'],function(){
 Route::post('register-clients', 'AuthController@register');
 Route::post('login-register','AuthController@login');
 Route::post('reset', 'AuthController@reset');
 
//facebook socialite

 Route::post('new-password', 'AuthController@password');

//search car 
 Route::get('search-cars', 'MainController@searchCars');
 
 Route::get('viewcar/{id}', 'MainController@viewCar');
 Route::post('viewOrders/{id}', 'MainController@orderinsert');
  Route::get('reservasion-car', 'MainController@reservasionCar');
Route::get('viewaddition/{id}', 'MainController@viewAddition');
  // Add to cart
		//===============================================================

		Route::group(['middleware'=>'auth:api'],function(){
	 	// Add to cart
		//cart page 
				Route::post('/add-cart', 'MainController@addtocart');

		Route::get('cart', 'MainController@cart');
		//order 
   		Route::post('order', 'MainController@order');
   		//order 
   		Route::get('view-reservasion', 'MainController@reservasion');
   		
   		//edit user
   				Route::get('/edit-user', 'AuthController@editUser');
				Route::post('/edit-user', 'AuthController@updateUser');

   		
	});








});
