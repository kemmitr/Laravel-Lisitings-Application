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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/', 'ListingsController@index');
Route::resource('listings', 'ListingsController');

Route::resource('comments', 'CommentsController');
Route::resource('comments/replies', 'CommentsRepliesController');
Route::resource('/contact', 'ContactController');
Route::get('/searchpage', 'SearchController@index');
Route::post('/search', 'SearchController@search');
Route::get('/payment/{id}', 'PaymentController@purchase');
Route::get('/name', 'PersonController@name');
Route::get('/bank', 'BankCOntroller@index');
Route::post('/bank', 'BankCOntroller@store');
Route::get('/bank/create', 'BankController@create');
Route::get('/bank/{id}', 'BankController@show');
Route::get('/comment', 'CommentsController@index');



