<?php
namespace EventGuide\Reservations\Repositories;

use EventGuide\AbstractRepository;
use EventGuide\Reservations\Reservation;

/**
 * Class ReservationEloquent
 * @package EventGuide\Reservations\Repositories
 */
class ReservationEloquent extends AbstractRepository implements ReservationInterface
{
    /**
     * @param Reservation $model
     */
    public function __construct(Reservation $model)
    {
        parent::__construct($model);
    }
}