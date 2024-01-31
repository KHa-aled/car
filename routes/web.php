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
 
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
 Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
     
     // Users Login Form Submit
Route::post('/user-login', 'UsersController@login');
// Users Login/Register pages
Route::get('/login-register','UsersController@userLoginRegister');
Route::match(['get', 'post'], 'register-clients', 'UsersController@register');
// Users Logout
Route::get('/user-logout','UsersController@logout');

Route::get('/','WelcomeController@categoryCar');
Route::get('/index/{id}','WelcomeController@detailsCar');
// Add to cart
Route::match(['get', 'post'], '/add-cart', 'CarController@addtocart');
//cart page 
Route::match(['get', 'post'], 'cart', 'CarController@cart');

Route::match(['get','post'],'/search-cars','CarController@searchCars');


//contact Us
Route::match(['get', 'post'], '/contact', 'ContactController@contactUS')->name('contact');

//========================== All Routes after login ==================================================
Route::group(['middleware'=>['Frontlogin']], function(){

	//order 
   Route::match(['get', 'post'], 'order', 'CarController@order');
   // reservasion route
	Route::match(['get', 'post'], '/reservasion-car', 'ReservasionController@reservasionCars');
	// Profile route
	Route::match(['get', 'post'], 'edit-Profile', 'UsersController@editProfile');

 });
 
 	Route::get('about-us','AboutUs@about');


});






Route::get('/verify-user/{id}/{userToken}','UsersController@verifyUser');
// Reset Password 
Route::get('forgot','UsersController@forgot');
Route::match(['get', 'post'],'forgot/password', 'UsersController@forgot_password');
Route::match(['get', 'post'],'reset/password/{token}', 'UsersController@reset_password');

Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::match(['get', 'post'], '/car-details', 'CarController@carDetails');

//Apply Coupon
Route::post('cart/apply-coupon','CarController@applyCoupon');






Route::get('rating','RatingController@index');
//========================== Rout Admin Panel ========================================================
Route::group(['middleware'=>['auth']], function(){
	// dashboard
	Route::get('admin/dashboard', 'AdminController@dashboard');
	// change password in admin panel
	Route::get('admin/settings', 'AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'], 'admin/update-pwd','AdminController@updatePassword');
	// Creat Admin and company
	Route::match(['get', 'post'],'admin-creat','AdminController@creatAdmins');
	
		Route::match(['get', 'post'],'admin-edit/{id}','AdminController@editAdmins');
	Route::match(['get', 'post'],'admin/admin-delete/{id}','AdminController@deleteAdmins');
	
	Route::get('admin-view','AdminController@viewAdmins' );
	// car Routes(Admin)
	Route::match(['get', 'post'],'admin/add-car', 'CarController@addCar');
	Route::match(['get', 'post'],'admin/edit-car/{id}', 'CarController@editCar');
  Route::match(['get', 'post'],'admin/delete-car/{id}','CarController@deleteCar');

	Route::get('admin/view-cars', 'CarController@viewCars');
	// Coupon Routes
	Route::match(['get','post'],'/admin/add-coupon','CarController@addCoupon');
	Route::match(['get','post'],'/admin/edit-coupon/{id}','CarController@editCoupon');
	Route::get('admin/view-coupons', 'CarController@viewCoupons');
	Route::get('/admin/delete-coupon/{id}', 'CarController@deleteCoupon');
	// view orders 
	Route::match(['get','post'],'/admin/view-orders','CarController@viewOrders');
    // about us
    Route::match(['get', 'post'],'add-aboutUs', 'AboutUs@aboutUs');

	//statistics
	Route::get('admin/dashboard', 'AdminController@statistics');

	
	//send post
	Route::get('admin/posts', 'PostController@index');
	Route::get('admin/post/{id}', 'PostController@showPost');

	Route::get('admin/post', 'PostController@createPost');
	Route::post('admin/post', 'PostController@storePost');
	//comment
	Route::post('admin/post/{id}/store', 'CommentsController@storeComment');
     //my-chartchartCar
	Route::get('my-chart', 'ChartController@index');

	Route::match(['get', 'post'],'admin/contact', 'ContactController@contact');
	// addation Routes(Admin)
	Route::match(['get', 'post'],'admin/addation', 'CompanyController@addation');
	

Route::get('admin/send-massage/{id}','CompanyController@sendMassage' );

Route::get('view-user','RoleController@viewUser');
Route::match(['get','post'],'update','RoleController@update');
Route::get('/admin/index','RoleController@adminRole');
Route::match(['get','post'],'/role-create','RoleController@create');
Route::match(['get', 'post'], 'role-edit/{id}', 'RoleController@roleEdit');
Route::match(['get', 'post'], 'role-delete/{id}', 'RoleController@roleDelete');
Route::resource('user', 'RoleController');
});

Route::get('logout', 'AdminController@logout');



//facebook socialite
Route::get('login-register/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login-register/facebook/callback', 'Auth\LoginController@handleProviderCallback');
// notification
Route::get('admin/notification/{id}','AdminController@sendMassage' );
Route::match(['get', 'post'],'view/notification', 'AdminController@viewNotification');

