<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::post('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/media', 'App\Http\Controllers\Tabela1Controller@tabela1')->name('media');
Route::post('/media', 'App\Http\Controllers\Tabela1Controller@tabela1')->name('media');
Route::get('/mediana', 'App\Http\Controllers\Tabela2Controller@mediana')->name('mediana');
Route::get('/descrepancia', 'App\Http\Controllers\Tabela3Controller@tela3')->name('descrepancia');
Route::get('/score', 'App\Http\Controllers\ScoreController@score')->name('score');
Route::get('/percentil', 'App\Http\Controllers\PercentilController@percentual')->name('percentil');
