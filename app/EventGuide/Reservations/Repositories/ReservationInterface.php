<?php
namespace EventGuide\Reservations\Repositories;

use EventGuide\Reservations\Reservation;

/**
 * Interface ReservationInterface
 * @package EventGuide\Reservations\Repositories
 */
interface ReservationInterface
{
    /**
     * @param array $request
     * @return Reservation
     */
    public function createReservation(array $request);
}
