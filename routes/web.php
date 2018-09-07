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


// User Route
Route::group(['namespace'=>'User'],function(){

	Route::get('/','HomeController@index');
	Route::get('post/{slug}','PostController@post')->name('post'); 
	Route::get('about','PostController@about')->name('about'); 
	Route::get('contact','PostController@contact')->name('contact'); 

	Route::get('post/tag/{tag}','HomeController@tag')->name('tag'); 
	Route::get('post/category/{category}','HomeController@category')->name('category'); 
});



// Admin
Route::group(['namespace'=>'Admin'],function(){

Route::get('admin/home','HomeController@index')->name('admin.home');
//Post Route
Route::resource('admin/post','PostController');
//Permission Route
Route::resource('admin/permission','PermissionController');
//User Route
Route::resource('admin/user','UserController');
//category Route
Route::resource('admin/category','CategoryController');
//role Route
Route::resource('admin/role','RoleController');
//tag Route
Route::resource('admin/tag','TagController');

//admin auth route

// Authentication Routes...
        Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('admin-login', 'Auth\LoginController@login');
        /*Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');*/

        /* Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');*/

});



Auth::routes();
/*Route::post('user-logout', 'Auth\LoginController@userLogout')->name('user.logout');*/

Route::get('/home', 'HomeController@index')->name('home');
