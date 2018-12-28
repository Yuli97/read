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
    return redirect('/home');
});

Auth::routes();

//Auth::routes(['verify' => true]);
// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', function () {
    return redirect('/company');
});

Route::resource('company', 'CompanyController')->middleware('auth');
Route::get('company/delete/{id}', 'CompanyController@eliminar')->middleware('auth')->name('company.delete');
