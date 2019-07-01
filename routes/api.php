<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\MailController;

Route::post('login', 'AuthController@login');
Route::middleware(AuthMiddleware::class)->get('logout', 'AuthController@logout');
Route::middleware(AuthMiddleware::class)->get('refresh', 'AuthController@refresh');
Route::middleware(AuthMiddleware::class)->get('me', 'AuthController@me');



Route::post('/applications', 'ApplicationController@store');
Route::middleware(AuthMiddleware::class)->get('/applications', 'ApplicationController@index');
Route::middleware(AuthMiddleware::class)->put('/applications/{id}', 'ApplicationController@update');
Route::get('/download/{id}', 'ApplicationController@download');

Route::get('/teste', 'MailController@sendMail');