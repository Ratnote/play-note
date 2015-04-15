<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
| 
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getHome'));
Route::get('/friday', array('as' => 'friday', 'uses' => 'HomeController@getFriday'));
Route::get('/dope', array('as' => 'dope', 'uses' => 'HomeController@getDope'));
Route::get('/depression', array('as' => 'depression', 'uses' => 'HomeController@getDepression'));
Route::get('/suit-n-tie', array('as' => 'suit', 'uses' => 'HomeController@getSuit'));
Route::get('/how-to', array('as' => 'how-to', 'uses' => 'HomeController@getHowTo'));
Route::get('/user/{user}', array('as' => 'show-playlists-by-user', 'uses' => 'PostController@showUserPlaylists'));

	Route::group(array('before' => 'quest'), function(){

		Route::group(array('before' => 'csrf'), function(){

		Route::post('/register', array('as' => 'account-register-post', 'uses' => 'UserController@postAccountRegister'));
		Route::post('/login', array('as' => 'account-login-post', 'uses' => 'UserController@postAccountLogin'));
		Route::post('/playlists/{slug}', array('as' => 'comment-post', 'uses'=> 'CommentController@postComment'));
		});

		Route::get('/register', array('as' => 'account-register-get', 'uses' => 'UserController@getAccountRegister'));
		Route::get('/login', array('as' => 'account-login-get', 'uses' => 'UserController@getAccountLogin'));
		Route::get('/playlists/{slug}', array('as' => 'show-post', 'uses' => 'PostController@showPost'));
	});

	Route::group(array('before' => 'auth'), function(){

		Route::group(array('before' => 'csrf'), function(){

			Route::post ('/remove-favorite-profile', array('as' => 'delete-favorite-profile-post', 'uses' => 'UserController@postRemoveFavoriteProfile'));
			Route::post('/upload', array('as' => 'playlist-upload-post', 'uses' => 'UserController@postPlaylistUpload'));
			Route::post('/playlistss/{slug}', array ('as' => 'add-to-playlist', 'uses' => 'UserController@postAddPlaylist'));
			Route::post('playlist-remove/{slug}', array ('as' => 'delete-from-playlist', 'uses' => 'userController@postDeletePlaylist'));
			Route::post('/remove-like/{slug}', array ('as' => 'remove-like', 'uses' => 'UserController@postRemoveLike'));
			Route::post('/add-like', array ('as' => 'add-like', 'uses' => 'UserController@postAddLike'));
		});
		Route::get('/logout', array('as' => 'account-logout-get', 'uses' => 'UserController@getAccountLogout'));
		Route::get('/upload', array('as' => 'playlist-upload-get', 'uses' => 'UserController@getPlaylistUpload'));
		Route::get('/my-profile', array('as' => 'user-profile-get', 'uses' => 'UserController@getUserProfile'));
	});