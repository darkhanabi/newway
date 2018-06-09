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

Route::get('heroes', 'HeroApiController@listHeroes');
Route::get('hero/{id}', 'HeroApiController@getHero');
Route::post('hero', 'HeroApiController@addHero');
Route::put('hero/{id}', 'HeroApiController@editHero');
Route::delete('hero/{id}', 'HeroApiController@deleteHero');
