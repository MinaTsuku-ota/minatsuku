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

// HTTPメソッド:GET  PATH:'/' (localhost)  アクション:クロージャ
// Route::get('/', function () {
//     // welcome.blade.phpを表示
//     return view('welcome');
// });

// Route::get('/', 'WelcomeController@index')->name('home');

// root
// Route::get('/', 'ArticlesController@index')->name('home');

// root
Route::get('/', 'IndexController@index')->name('index');

Route::get('about', 'PagesController@about')->name('about');
Route::get('contact', 'PagesController@contact')->name('contact');

// Route::get('articles', 'ArticlesController@index')->name('articles.index');
// Route::get('articles/create', 'ArticlesController@create')->name('articles.create'); // 順番に注意
// Route::get('articles/{id}', 'ArticlesController@show')->name('articles.show');
// Route::post('articles', 'ArticlesController@store')->name('articles.store'); // 記事の保存
// Route::get('articles/{id}/edit', 'ArticlesController@edit')->name('articles.edit');  // 記事の編集
// Route::patch('articles/{id}', 'ArticlesController@update')->name('articles.update');  // 記事の更新 メソッド:patch
// Route::delete('articles/{id}', 'ArticlesController@destroy')->name('articles.destroy'); // 記事の削除
// 上7行は1行で
Route::resource('articles', 'ArticlesController');

// 認証関連のルート設定
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
