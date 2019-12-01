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
Route::get('/', function () {
    // resources/views/welcome.blade.phpを表示
    return view('welcome');
});
