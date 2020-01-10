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
//コメントのajax通信
Route::post('&', 'ArticlesController@post_ajax');

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

// WEB、写真、動画タブの画面遷移する仮ページ
Route::get('articles2', 'ArticlesController@index2')->name('articles.index2');
Route::get('articles3', 'ArticlesController@index3')->name('articles.index3');
Route::get('articles4', 'ArticlesController@index4')->name('articles.index4');

// ご意見ページ用
Route::get('opinion', 'OpinionController@index')->name('opinion');
Route::post('opinion', 'OpinionController@post')->name('opinion'); // 送信

// ぽりしぃ
Route::get('policy', 'PolicyController@index')->name('policy');
Route::get('policy_iframe', 'PolicyController@show_iframe')->name('policy_iframe');

// 認証関連のルート設定
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// マイページ用(dashboard)
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
Route::post('dashboard', 'DashboardController@post')->name('dashboard.post'); // dashboardでgoogle reCAPTHA v3を使ってみる
Route::patch('dashboard', 'DashboardController@update')->name('dashboard.update'); // ユーザデータの更新

// テスト用ページ 既にあったPagesControllerを再利用
Route::get('test', 'PagesController@test')->name('test');
Route::post('test', 'PagesController@post')->name('test.post');

// ajaxテスト用
Route::get('ajaxtest', 'PagesController@ajaxtest')->name('ajaxtest');
Route::get('ajaxtest.get', 'PagesController@ajaxtest_get')->name('ajaxtest.get');

//fav機能
Route::post('articles/{article}/fav', 'ArticlesController@');

// ドラッグアンドドロップテスト用
Route::get('ddtest', 'PagesController@ddtest')->name('ddtest');
Route::post('ddtest', 'PagesController@ddtest_post')->name('ddtest');

// 開発者用ページ
Route::get('dev', 'DeveloperController@index')->name('dev');

// キューテスト用
Route::get('sample/queues', 'SampleController@queues');
Route::get('sample/queues/none', 'SampleController@queuesNone');
Route::get('sample/queues/database', 'SampleController@queuesDatabase');
