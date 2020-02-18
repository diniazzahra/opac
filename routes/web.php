<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your aplication. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * Home controller
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * Account
 */
Route::prefix('account')->name('account.')->group(function (){
    Route::get('/profil', 'AccountController@profil')->name('profil.show');
    Route::get('/oauth/personal-access-token', 'AccountController@oauthPersonalToken')->name('oauth.token');
});

// Authentication Routes...
Route::prefix('auth')->name('auth.')->group(function (){
    Route::get('/', 'Auth\LoginController@showIndexForm')->name('index');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.form');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    /**
     * Oauth2
     */
    Route::get('/login/aulia-id', 'Auth\LoginController@auliaIdRedirect')->name('login.redirect');
    Route::get('/login/callback', 'Auth\LoginController@callback')->name('login.callback');
});

/**
 * Buku
 */
Route::prefix('buku')->name('buku.')->group(function (){
    Route::get('/detail/{id?}', 'BukuController@detail')->name('detail');
    Route::get('/search', 'BukuController@search')->name('search');
    Route::get('/advSearch', 'BukuController@advancedSearch')->name('advSearch');
});

