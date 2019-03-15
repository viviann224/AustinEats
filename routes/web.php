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

Route::get('/', 'PagesController@index');

// Route::get('/hello', function () {
//     return "<h1>hello world</h1>";
//
// });

Route::get('/about', "PagesController@about");



Route::get('/services',"PagesController@services");
//creates post list
Route::resource("posts", "PostsController");
Route::get('/coffee',"PostsController@coffee");
Route::get('/event',"PostsController@event");
Route::get('/resturant',"PostsController@resturant");



Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
