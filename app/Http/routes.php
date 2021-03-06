<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('includes/search', [
	'as'=>'search', 'uses'=>'HomeController@search'
]);


Route::auth();

Route::group(['middleware'=>'admin'], function(){

	Route::get('/admin', function (){
	return view('admin.index');
	});

	Route::resource('admin/users', 'AdminUsersController');

	Route::resource('admin/posts', 'AdminPostsController');
	
	Route::resource('admin/categories', 'AdminCategoriesController');

	Route::resource('admin/books', 'BooksController');
	Route::get('/adminresults', function () {
		return view('admin.adminresults');
	});

});


