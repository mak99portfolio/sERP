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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');



Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);


Route::namespace('Core')->prefix('core')->group(function(){

    Route::get('cities', 'CityController@index')->name('core.cities');

});

Route::namespace('Procurement')->prefix('procurement')->group(function(){

    Route::get('packing-list', 'PackingController@index')->name('procurement.packing_list');

});
