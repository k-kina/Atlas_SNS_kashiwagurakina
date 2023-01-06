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

Route::get('/search','UsersController@search');//ユーザー検索一覧表示
Route::get('/search','UsersController@usersearch');//検索機能

Route::post('/follow','UsersController@follow');//フォロー機能
Route::post('/unFollow','UsersController@unFollow');//フォロー解除機能


Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/otherProfile','UsersController@profile');//フォローしている人のプロフィールページ
Route::get('/otherProfile2','UsersController@profile');
//フォローされている人のプロフィールページ

Route::get('/logout','Auth\LoginController@logout');
