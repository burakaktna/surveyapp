<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\SurveyController;
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

Route::get('get-random-advertisement', [AdvertisementController::class, 'getRandomAdvertisement']);
Route::post('store-survey', [SurveyController::class, 'store'])->name('store_survey');
