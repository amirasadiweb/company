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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['register' => false]);

Route::resource('companies','CompaniesController');
Route::get('companiessoft/soft','CompaniesController@softdelete')->name('companies.soft');
Route::get('companiessoft/{soft}/restore','CompaniesController@restore')->name('companies.restore');
Route::get('companiessoft/{soft}/force','CompaniesController@force')->name('companies.force');


Route::resource('employes','EmployesController');
Route::get('employesoft/soft','EmployesController@softdelete')->name('employes.soft');
Route::get('employesoft/{soft}/restore','EmployesController@restore')->name('employes.restore');
Route::get('employesoft/{soft}/force','EmployesController@force')->name('employes.force');