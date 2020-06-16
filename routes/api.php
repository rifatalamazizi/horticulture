<?php

use Illuminate\Http\Request;

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

// Default by framework
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */




/*
|--------------------------------------------------------------------------
| Api Cart route 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'carts'],function(){

    Route::get('/','Api\CartController@index')->name('carts');
    Route::post('/store','Api\CartController@store')->name('carts.store');
    Route::post('/update/{id}','Api\CartController@update')->name('carts.update');
    Route::post('/delete/{id}','Api\CartController@delete')->name('carts.delete');

});
