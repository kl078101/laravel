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

        Route::prefix('adminuser')->group(function () {
            Route::get('/', 'AdminUserController@index')->name('admin.adminuser');
            Route::get('add/{adminuser?}', 'AdminUserController@add')->name('admin.adminuser.add');
            Route::post('add/{adminuser?}', 'AdminUserController@save')->name('admin.adminuser.add');
            Route::get('remove/{adminuser?}', 'AdminUserController@remove')->name('admin.adminuser.remove');
            Route::get('state/{adminuser?}', 'AdminUserController@state')->name('admin.adminuser.state');
        });
    });

});
