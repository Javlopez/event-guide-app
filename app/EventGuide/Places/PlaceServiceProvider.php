<?php
namespace EventGuide\Places;

use Illuminate\Support\ServiceProvider;

class PlaceServiceProvider extends  ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'EventGuide\\Places\\Repositories\\PlaceInterface',
            'EventGuide\\Places\\Repositories\\PlaceEloquent'
        );
    }
}
