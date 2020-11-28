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

Auth::routes();

Route::get('login', 'UserController@login'); 
Route::get('registration', 'UserController@registration');
Route::post('post-registration', 'UserController@postRegistration'); 
Route::post('post-login', 'UserController@postLogin')->name('post_login	');
Route::group(['middleware'=>'logCheck'],function(){
	Route::get('dashboard', 'UserController@dashboard'); 
	Route::get('logout', 'UserController@logout');
	Route::get('newPassword','UserController@newPassword');
	Route::put('/update-password/{id}','UserController@updatepassword');
	Route::get('profileUpdate','UserController@profileUpdate');
	Route::put('/update-profile/{id}','UserController@updateprofile');
	Route::resource('department', 'DepartmentController');
	Route::resource('office', 'OfficeController');
	Route::resource('userType', 'UserTypeController');
	Route::resource('task', 'TaskController');
	Route::get('/add-task/{id}','TaskController@addTask');
	Route::post('createTask', 'TaskController@create'); 
	Route::get('recivedTask','TaskController@recivedTask');
	Route::get('assignedTask','TaskController@assignedTask');	
	Route::group(['middleware'=>'Admin'],function(){
		Route::resource('user', 'UserController');
		Route::get('totalAssignTask','TaskController@totalAssignTask');
	});
});
