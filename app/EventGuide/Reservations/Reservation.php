<?php
namespace EventGuide\Reservations;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 * @package EventGuide\Reservations
 */
class Reservation extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stand()
    {
        return $this->belongsTo('EventGuide\Stands\Stand');
    }
}
