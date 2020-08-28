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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('login', 'LoginController@index')->name('admin.login');
    Route::post('login', 'LoginController@check')->name('admin.login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    //受保护的路由，未登陆不能访问
    Route::middleware('adminlogincheck')->group(function () {
        Route::get('index', 'IndexController@index')->name('admin.index');
    });

});
