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

// route::get('/hello', function() {
//     return view('welcome');
// });

// route::get('/users/{id}/{name}', function($id, $name) {
//     return 'This is user '.$name.' '.$id;
// });

// route::get('/about', function() {
//     return view('pages.about');
// });

Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/staff-profile', 'PagesController@staffprofile');
Route::get('/staffs', 'PagesController@staffs');
Route::get('/announcements', 'PagesController@announcements');




Route::resource('posts','PostsController');
Route::get('approve-profile/{id}', 'PostsController@approveProfile')->name('approve-profile');
//users
Route::resource('users','UsersController');
Route::get('make-admin/{id}', 'UsersController@makeAdmin')->name('make-admin');
Route::get('activate-user/{id}', 'UsersController@activateUser')->name('activate-user');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
