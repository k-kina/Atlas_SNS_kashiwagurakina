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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function(){
Route::get('/top','PostsController@index')->name('/login');
});

Route::post('/post/create','PostsController@create');//投稿機能ルーティング

Route::post('/post/update','PostsController@update');//投稿内容編集

Route::get('/post/{id}/delete','PostsController@delete');//削除機能

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');//ユーザー検索画面
Route::get('/search','UsersController@usersearch');//検索機能

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::get('/logout','Auth\LoginController@logout');
