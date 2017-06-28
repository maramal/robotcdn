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

/* Middleware HttpsProtocol: Redirects request to SSL */
Route::group(['middleware' => 'ssl'], function() {
	/* Middleware SetLocale: Change Locale to desired language  */
	Route::group(['middleware' => 'locale'], function() {
		/* Provides routes for Authentication */
		Auth::routes();
		
		/* Main pages */
		Route::get('/', 'WebController@index')->name('home');
		Route::get('/howdoesitwork', 'WebController@howdoesitwork')->name('howdoesitwork');
		Route::get('/credits', 'WebController@credits')->name('credits');
		Route::get('/license', 'WebController@license')->name('license');
		
		/* Change site's language */
		Route::get('/locale/{locale}', function($locale) {
			\Session::put('locale', $locale);
			return back();
		});
		
		/* Returns desired link*/
		Route::get('/lib/{fn}', 'LibraryController@getContent', function($id) {});
		
		/* Middleware RedirectAuthenticated: Pages with required authentication */
		Route::group(['middleware' => 'auth'], function() {
			
			/* Admin Panel: Themes */
			Route::resource('themes', 'ThemeController');
			Route::get('/themes/{id}/delete', 'ThemeController@destroy', function($id) {});
			Route::get('/themes/{id}/use', 'ThemeController@use', function($id) {});
			
			/* Admin Panel: CDN Links */
			Route::resource('cdn', 'CDNController');
			Route::get('/cdn/{id}/delete', 'CDNController@destroy', function($id) {});
			
			/* Manual logout if authenticated */
			Route::get('logout', 'WebController@logout');
		});
		
		/* Returns CDN Link */
		Route::get('/url/{id}', 'LibraryController@url', function($id) {});
		});
});
