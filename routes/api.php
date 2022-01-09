<?php

use App\Http\Controllers\Api\AuthenticationController;
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

Route::group(['namespace' => 'Api'], function () {
    //guest routes
    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('register', [AuthenticationController::class, 'register']);

   // protected routes
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', [AuthenticationController::class, 'user']);
        Route::post('logout', [AuthenticationController::class, 'logout']);
    });
});
