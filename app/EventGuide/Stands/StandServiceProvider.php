<?php
namespace EventGuide\Stands;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package EventGuide\Events
 */
class StandServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'EventGuide\\Stands\\Repositories\\StandInterface',
            'EventGuide\\Stands\\Repositories\\StandEloquent'
        );
    }
}
