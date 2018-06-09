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

Route::get('/', function () {
    return view('welcome', ['title' => "Welcome | The Guild"]);
});

Route::get('/list', 'HeroController@listHeroes');
Route::post('/add', 'HeroController@addHero');
Route::delete('/delete/{id}', 'HeroController@deleteHero');
Route::post('/edit/{id}', 'HeroController@editHero');
Route::get('/search', 'HeroController@searchHero');