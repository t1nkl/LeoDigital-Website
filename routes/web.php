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

Route::resource('/', 'HomeController');
Route::resource('/language/{lang}/', 'LanguageController@index');
Route::resource('about', 'AboutController');
Route::resource('project', 'ProjectController');
Route::resource('portfolio', 'PortfolioController');
Route::resource('portfolio_single', 'PortfolioController@test');
Route::resource('blog', 'BlogController');
