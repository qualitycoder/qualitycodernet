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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('pages')->namespace('Pages')->group(function(){
    Route::resource('home', 'Home')->except(['create', 'edit', 'show']);
    Route::resource('about', 'About')->except(['create', 'edit', 'show']);
});

Route::resource('projects', 'Projects')
    ->except(['create', 'edit']);

Route::resource('webhooks', 'Webhooks')
    ->except(['create', 'edit']);
