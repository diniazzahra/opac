<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1/buku')->name('v1.buku.')->group(function(){
    Route::get('/','Api\v1\ApiController@getAll')->name('get-all');
    Route::post('/', 'Api\v1\ApiController@store')->name('store');
    Route::get('detail/{id}','Api\v1\ApiController@details')->name('detail');
    Route::get('search','Api\v1\ApiController@search')->name('search');
    Route::get('advsearch','Api\v1\ApiController@advancedSearch')->name('adv-search');
    Route::delete('destroy/{id}', 'Api\v1\ApiController@delete')->name('destroy');

    //Route::get('paginatesearch','Api\v1\ApiController@paginateSearch')->name('paginateSearch');
});
