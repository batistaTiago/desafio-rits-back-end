<?php

use App\Http\Middleware\AuthMiddleware;

Route::post('login', 'AuthController@login');
Route::middleware(AuthMiddleware::class)->get('logout', 'AuthController@logout');
Route::middleware(AuthMiddleware::class)->get('refresh', 'AuthController@refresh');
Route::middleware(AuthMiddleware::class)->get('me', 'AuthController@me');



Route::post('/applications', 'ApplicationController@store');
Route::middleware(AuthMiddleware::class)->get('/applications', 'ApplicationController@index');
Route::middleware(AuthMiddleware::class)->put('/applications/{id}', 'ApplicationController@update');
Route::middleware(AuthMiddleware::class)->get('/download/{id}', 'ApplicationController@download');
