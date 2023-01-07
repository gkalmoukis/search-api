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
Route::group([
    "prefix" => "content" 
], function (){
    Route::get('/locations', [\App\Http\Controllers\ContentController::class, 'getLocations']);
    Route::get('/availabilities', [\App\Http\Controllers\ContentController::class, 'getAvailabilities']);
});


Route::group([
    "prefix" => "listings" 
], function (){
    Route::get('/', [\App\Http\Controllers\ListingController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\ListingController::class, 'show']);
});

