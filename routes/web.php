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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'middleware' => ['auth']] , function () {
    Route::resource('areas', 'AreaController');
    Route::resource('comments', 'CommentController');
    Route::resource('constructors', 'ConstructorController');
    Route::resource('members', 'MemberController');
    Route::resource('reports', 'ReportController');
    Route::resource('tasks', 'TaskController');
/*    Route::resource('applies', 'ApplyController')->only(['index', 'show']);;*/

});



