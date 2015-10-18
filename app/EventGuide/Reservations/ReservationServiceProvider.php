<?php
namespace EventGuide\Reservations;

use Illuminate\Support\ServiceProvider;

/**
 * Class ReservationServiceProvider
 * @package EventGuide\Reservations
 */
class ReservationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'EventGuide\\Reservations\\Repositories\\ReservationInterface',
            'EventGuide\\Reservations\\Repositories\\ReservationEloquent'
        );
    }
}
