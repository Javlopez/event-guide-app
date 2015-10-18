<?php

Route::get('/', 'HomeController@index');
Route::get('/events/new/{id}', 'EventsController@create');
Route::get('/events/{id}', 'EventsController@show');
Route::get('/stands/reservation/{id}', ['as' => 'stands.reservation','uses' => 'StandsController@reservation']);
Route::get('/stands/{id}', ['as' => 'stands.show','uses' => 'StandsController@show']);
