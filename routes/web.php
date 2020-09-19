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

Auth::routes(['register' => false]);
/* Dashboard */
Route::get('/', 'HomeController@index')->name('Dashboard');
Route::get('/home', 'HomeController@index')->name('Dashboard');

/* Expenses Category */
Route::get('/expenses/category', 'ExpensesCategoryController@index')->name('Expenses Category');
Route::post('/expenses/category/', 'ExpensesCategoryController@create');
Route::post('/expenses/category/{id}', 'ExpensesCategoryController@edit');
Route::get('/expenses/category/delete/{id}', 'ExpensesCategoryController@delete');

/* Expenses */
Route::get('/expenses', 'ExpensesController@index')->name('Expenses');
Route::post('/expenses', 'ExpensesController@create');
Route::post('/expenses/{id}', 'ExpensesController@edit');
Route::get('/expenses/delete/{id}', 'ExpensesController@delete');

/* Users Role */
Route::get('/users/role', 'UsersRoleController@index')->name('Expenses');
Route::post('/users/role/', 'UsersRoleController@create');
Route::post('/users/role/{id}', 'UsersRoleController@edit');
Route::get('/users/role/delete/{id}', 'UsersRoleController@delete');

/* Users */
Route::get('/users', 'UsersController@index')->name('Expenses');
Route::post('/users', 'UsersController@create');
Route::post('/users/{id}', 'UsersController@edit');
Route::get('/users/delete/{id}', 'UsersController@delete');

/* Change Password */
Route::get('/changepass', 'ChangePassController@index');
Route::post('/changepass', 'ChangePassController@edit');

Route::get('/error401', 'ErrorHandlerController@error401')->name('Error 401 - Access Denied');
