<?php

Route::get('weather', 'Exc\Weather\Controllers\WeatherController@info');
Route::post('weather/location', 'Exc\Weather\Controllers\WeatherController@location');
Route::post('weather/subscribe', 'Exc\Weather\Controllers\WeatherController@subscribe');
Route::get('weather/unsubscribe/{id}', 'Exc\Weather\Controllers\WeatherController@unsubscribe');