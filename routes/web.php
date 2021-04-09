<?php

use App\Http\Controllers\CarController;
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


Route::get('/', 'HomeController@classScore');

Route::get('/class-score', 'HomeController@classScore');

Route::get('/person-score-trend', 'HomeController@personScoreTrend');

Route::get('/person-error-trend', 'HomeController@personErrorTrend');

Route::get('/exam-error', 'HomeController@examError');



//Route::get('/home', 'StaticPagesController@home');
//Route::get('/help', 'StaticPagesController@help');
//Route::get('/about', 'StaticPagesController@about');
//Route::get('/rand', 'StaticPagesController@rand');
//Route::get('/rand', [\App\Http\Controllers\StaticPagesController::class, 'rand']);
//Route::get('/car/brandList/', [CarController::class, 'brandList']);
