<?php

Route::get('todo/api/list', 'Exc\Todo\Controllers\ApiController@list');
Route::get('todo/api/get/{id}', 'Exc\Todo\Controllers\ApiController@get');
Route::post('todo/api/create', 'Exc\Todo\Controllers\ApiController@create');
Route::put('todo/api/update', 'Exc\Todo\Controllers\ApiController@update');
Route::delete('todo/api/delete/{id}', 'Exc\Todo\Controllers\ApiController@delete');