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

Route::group(['middleware' => 'auth'], function () {
//cliant予約画面
Route::get('/booking', 'UserController@booking');
Route::post('/booking', 'AdminController@search');
//client条件送信ボタン押したときのaction
Route::post('/search', 'UserController@search');
Route::get('/checkCondition', 'UserController@checkCondition');
Route::post('/confirm', 'UserController@confirmDataSave');
Route::get('/confirm', 'UserController@confirm');
Route::get('/schedule', 'UserController@schedule');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
//配送業者homeからの画面遷移
Route::get('/schedule', 'AdminController@schedule');
Route::get('/carIndex', 'AdminController@carIndex');
Route::get('/add', 'AdminController@add');
Route::post('/add', 'AdminController@addCar');
Route::get('/report', 'AdminController@report');
Route::post('/report', 'AdminController@reportDataSave');
Route::get('/edit', 'AdminController@carDataEdit');
Route::post('/edit', 'AdminController@carDataUpdate');
Route::get('/delete', 'AdminController@carDataDelete');
});


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//ログイン
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('admin-register');

//ログイン後のホーム
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/admin', 'admin.home')->middleware('auth:admin')->name('admin-home');



