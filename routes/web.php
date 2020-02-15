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

use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('queues', 'QueueController');
// Route::get('queues',['as' => 'queues.create2', 'uses' => 'QueueController@create2']);
Route::get('queues/{id}', 'QueueController@show');

Route::resource('display','DisplayController');



Auth::routes([
    'register' => false
]);


Route::get('/admin', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('departments', 'DepartmentController',['except' => ['show']]);
    Route::resource('transactions', 'TransactionController',['except' => ['show']]);
    Route::resource('counters','CounterController',['except' => ['show']]);
    Route::resource('reports','ReportController');
    Route::put('admin',['as'=>'home.updatenotif','uses'=>'HomeController@updatenotif']);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});



