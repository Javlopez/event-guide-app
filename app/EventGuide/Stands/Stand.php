<?php
namespace EventGuide\Stands;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stand
 * @package EventGuide\Stand
 */
class Stand extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reservation()
    {
        return $this->hasOne('EventGuide\Reservations\Reservation');
    }
}