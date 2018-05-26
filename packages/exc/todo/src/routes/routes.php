<?php

Route::get('todo', 'Exc\Todo\Controllers\TodoController@list');
Route::get('todo/create', 'Exc\Todo\Controllers\TodoController@create');
Route::get('todo/delete/{id}', 'Exc\Todo\Controllers\TodoController@delete');
Route::get('todo/edit/{id}', 'Exc\Todo\Controllers\TodoController@edit');
Route::get('todo/update', 'Exc\Todo\Controllers\TodoController@update');