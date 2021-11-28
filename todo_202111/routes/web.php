<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

//？➃1***➄******************************************************
Route::get('/timeline', 'CategoryController@showTimelinePage')->name('timeline');
Route::post('/timeline', 'CategoryController@postCategory');

//➅1**18:37*******************************************************
Route::post('/timeline/delete/{id}', 'CategoryController@destroy')->name('destroy');


// Task****DBへ保存されない**************************************************
Route::get('/index', 'TaskController@showIndexPage')->name('index');
Route::post('/index','TaskController@postTask');

// DBへの保存 解決案_A  参考）*➈‐1 17:00********************************************************
// Route::get('index','TaskController@store');


//削除
Route::post('/index/delete/{id}', 'TaskController@destroy')->name('destroy');


// //共用get
// Route::get('/index/edit', 'TaskController@edit')->name('item.edit');
// //新規作成
// Route::post('/index/create', 'TaskController@create')->name('index.create');
// //編集
// Route::get('/index/detail/{id}', 'TaskController@detail')->name('index.detail');
// Route::post('/index/edit', 'TaskController@edit')->name('index.edit');


// Route::resource('index', 'TaskController');


