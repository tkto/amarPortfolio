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

Route::get('/', 'WelcomeController@index');
Route::get('/contact', 'WelcomeController@showContact');
Route::get('/portfolio', 'WelcomeController@showPortfolio');

Route::get('/admin-login', 'AdminController@index');
Route::post('/admin-login-check', 'AdminController@adminLoginCheck');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@getLogout');
Route::get('/add-category', 'SuperAdminController@addCategory');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::get('/manage-category', 'SuperAdminController@manageCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');

Route::group(['middleware' => ['web']], function() {
  Route::resource('post','PostController');  

  Route::resource('tag','TagController');  

});

Route::get('/manage-post', 'PostController@managePost');
Route::get('/portfolio', 'ProjectController@index');
Route::get('/portfolio/{id}', 'ProjectController@show');
Route::get('/create-portfolio', 'ProjectController@create');
Route::get('/edit-portfolio/{id}', 'ProjectController@edit');
Route::post('/save-project', 'ProjectController@store');
Route::post('/update-project', 'ProjectController@update');