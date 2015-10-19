<?php

Route::get('/', 'HomeController@index');
Route::get('/events/new/{id}', 'EventsController@create');
Route::get('/events/{id}', ['as' => 'event.show', 'uses' => 'EventsController@show']);
Route::post('/reservations', ['as' => 'reservations.save','uses' => 'ReservationsController@store']);
Route::get('/reservations/{id}', ['as' => 'reservation','uses' => 'ReservationsController@create']);
Route::get('/stands/{id}', ['as' => 'stands.show','uses' => 'StandsController@show']);
