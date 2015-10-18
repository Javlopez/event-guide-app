<?php

Route::get('/', 'HomeController@index');
Route::get('/events/new/{id}', 'EventsController@create');
Route::get('/events/{id}', 'EventsController@show');
