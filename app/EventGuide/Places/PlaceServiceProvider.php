<?php
namespace EventGuide\Places;

use Illuminate\Support\ServiceProvider;

/**
 * Class PlaceServiceProvider
 * @package EventGuide\Places
 */
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
