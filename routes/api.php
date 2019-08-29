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
    Route::get('home', 'Pages/Home');
    Route::get('about', function () {return 'about';});
});

Route::resource('projects', 'Projects')
    ->except(['create', 'edit']);

Route::resource('webhooks', 'Webhooks')
    ->except(['create', 'edit']);
