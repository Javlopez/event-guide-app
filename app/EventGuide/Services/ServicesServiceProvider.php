<?php
namespace EventGuide\Services;

use Illuminate\Support\ServiceProvider;

/**
 * Class ServicesServiceProvider
 * @package EventGuide\Services
 */
class ServicesServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'EventGuide\\Stands\\Repositories\\StandInterface',
            'EventGuide\\Stands\\Repositories\\StandEloquent'
        );
    }
}
