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

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'data' => [
            'base_url' => url('/'),
            'info' => auth()->guard('api')->check()? 'explore of api by accessing our documentation at '.url('').'/docs'
                :
                'you must log in to access our api content. get help at '.url('/').'/docs'
        ],
        'message' => 'welcome to clafiya api resource',
        'status' => 'success',
    ], 200);
})->name('home');
