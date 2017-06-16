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


Route::group(['middleware' => 'ssl'], function() {
	Route::group(['middleware' => 'locale'], function() {
		Auth::routes();
		
		Route::get('/', 'WebController@index')->name('home');
		
		Route::get('/locale/{locale}', function($locale) {
			\Session::put('locale', $locale);
			return back();
		});
		
		Route::get('/lib/{fn}', 'LibraryController@getContent', function($id) {});
		
		Route::group(['middleware' => 'auth'], function() {
			
			Route::resource('themes', 'ThemeController');
			Route::get('/themes/{id}/delete', 'ThemeController@destroy', function($id) {});
			Route::get('/themes/{id}/use', 'ThemeController@use', function($id) {});
			
			Route::resource('cdn', 'CDNController');
			Route::get('/cdn/{id}/delete', 'CDNController@destroy', function($id) {});
			
			Route::get('logout', 'WebController@logout');
		});
		
		Route::get('/url/{id}', 'LibraryController@url', function($id) {});
		});
});
