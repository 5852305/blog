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

Route::get('/','staticPagesController@home')->name('home');
Route::get('show','staticPagesController@show')->name('show');

Route::get('login','SessionController@create')->name('login');
Route::post('login','SessionController@store')->name('login');
Route::delete('logout','SessionController@destroy')->name('logout');
Route::get('logouts', 'SessionController@loginout');


Route::resource('users','UsersController');
Route::resource('articles','ArticlesController');
Route::post('article/{article}/comments','CommentsController@store');
Route::resource('tags','TagsController');
Route::resource('categorys','CategorysController');

Route::post('upload','UploadController@store')->name('upload');
Route::delete('unset','UploadController@destroy')->name('unset');

Route::get('auth/github', 'AuthController@redirectToProvider')->name('auth.github');
Route::get('auth/github/callback', 'AuthController@handleProviderCallback');





//接口(登陆之后的接口全写在这个文件，我暂时写在这，至于原因之后再说吧...)
Route::get('api/userprofile', 'UsersController@profile');
//显示所有文章
Route::get('api/allarticle','ArticlesController@allarticle');
Route::get('api/article/{id}', 'ArticlesController@singlearticle');
//等同于下面
// Route::get('/users', 'UsersController@index')->name('users.index');
// Route::get('/users/{user}', 'UsersController@show')->name('users.show');
// Route::get('/users/create', 'UsersController@create')->name('users.create');
// Route::post('/users', 'UsersController@store')->name('users.store');
// Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
// Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
// Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
