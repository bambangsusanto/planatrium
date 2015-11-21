<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home
Route::get('/', [
	'uses' => '\App\Http\Controllers\HomeController@index',
	'middleware' => 'guest',
	'as' => 'home',
]);


// Designer's Suite
Route::get('/suite', [
	'uses' => '\App\Http\Controllers\SuiteController@index',
	'as' => 'suite',
    'middleware' => 'auth',
]);
Route::get('/others_suite', [
    'uses' => '\App\Http\Controllers\OtherSuiteController@index',
    'as' => 'others_suite',
]);

// Request Designer
Route::get('/request', [
	'uses' => '\App\Http\Controllers\RequestController@create',
	'as' => 'request',
]);

Route::post('/request', 'RequestController@store');

// View All Request
Route::get('/request_view', [
    'uses' => '\App\Http\Controllers\RequestController@index',
    'as' => 'request_view',
    'middleware' => 'auth',
]);

Route::get('/request_view_show', [
    'uses' => '\App\Http\Controllers\RequestController@show',
    'as' => 'request_view_show',
    'middleware' => 'auth',
]);

Route::get('/request_take', [
    'uses' => '\App\Http\Controllers\RequestController@take',
    'as' => 'request_take',
    'middleware' => 'auth',
]);

// Authentication
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Custom Authentication
Route::get('/login', 'Auth\CustomAuthController@getLogin');
Route::post('/login', 'Auth\CustomAuthController@postLogin');

// Profiling
Route::get('/make_profile', [
    'uses' => '\App\Http\Controllers\ProfileController@create',
    'as' => 'profile',
    'middleware' => 'auth',
]);

Route::post('/make_profile', [
    'uses' => '\App\Http\Controllers\ProfileController@store',
    'as' => 'profile.post',
    'middleware' => 'auth',
]);

Route::get('/edit_profile', [
    'uses' => '\App\Http\Controllers\ProfileController@edit',
    'as' => 'profile.edit',
    'middlware' => 'auth',
]);

Route::post('/edit_profile', [
    'uses' => '\App\Http\Controllers\ProfileController@update',
    'as' => 'profile.edit_post',
    'middleware' => 'auth',
]);

// Showroom
Route::get('/showroom', [
	'uses' => '\App\Http\Controllers\ShowroomController@index',
	'as' => 'showroom',
]);

// Showcase
Route::get('showcase', [
    'uses' => '\App\Http\Controllers\ShowcaseController@index',
    'middleware' => 'auth',
    'as' => 'showcase',
]);
Route::post('showcase', [
    'uses' => '\App\Http\Controllers\ShowcaseController@store',
    'middleware' => 'auth',
    'as' => 'showcase.post',
]);

// Project
Route::get('/project', [
    'uses' => '\App\Http\Controllers\ProjectController@index',
    'as' => 'project'
]);

// Upload image
Route::post('/project', [
    'uses' => '\App\Http\Controllers\ProjectController@upload',
    'middlware' => 'auth',
    'as' => 'upload_image'
]);

Route::get('/project_favorite', [
    'uses' => '\App\Http\Controllers\ProjectController@favorite',
    'middleware' => 'auth',
    'as' => 'project_favorite',
]);