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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'Backend\AdminController@index')->name('admin');

/**
 * Login Route(s)
 */
Route::post('login', 'Auth\LoginController@postLogin');



Route::group(['middleware' => 'auth', 'middleware' => 'role:super-admin|admin', 'prefix' =>'admin'], function() {
    /**
     * Admin Route(s)
     */
    Route::resource('roles', 'Backend\RoleController');
    Route::resource('users', 'Backend\UserController');
});

Route::get('/', 'Frontend\IndexController@index')->name('home');