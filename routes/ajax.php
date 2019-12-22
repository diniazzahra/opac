<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 28/04/2019
 * Time: 21:28
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "ajax" middleware group. Enjoy building your API!
|
*/
Route::name('ajax.nama.')->group(function (){
    Route::post('/nama/sub1', 'AjaxNamaController@sub1')->name('sub1');
    Route::get('/nama/sub2', 'AjaxNamaController@sub2')->name('sub2');
});



