<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/applications', 'ApplicationController@store');
Route::get('/applications', 'ApplicationController@index');
Route::put('/applications/{id}', 'ApplicationController@update');