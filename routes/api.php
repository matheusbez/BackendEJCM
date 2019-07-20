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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('mostraCarro/{id}','CarController@showCar');
Route::get('listaCarro','CarController@listCar');
Route::get('mostraConcessionaria/{id}','DealershipController@showDealership');
Route::get('listaConcessionaria','DealershipController@listDealership');
Route::post('criaCarro','CarController@createCar');
Route::post('criaConcessionaria','DealershipController@createDealership');
Route::put('atualizaCarro/{id}','CarController@updateCar');
Route::put('atualizaConcessionaria/{id}','DealershipController@updateDealership');
Route::delete('deletaCarro/{id}','CarController@deleteCar');
Route::delete('deletaConcessionaria/{id}','DealershipController@deleteDealership');




