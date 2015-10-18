<?php
namespace EventGuide\Events;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package EventGuide\Events
 */
class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'EventGuide\\Events\\Repositories\\EventInterface',
            'EventGuide\\Events\\Repositories\\EventEloquent'
        );
    }
}
