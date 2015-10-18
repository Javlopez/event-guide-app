<?php
namespace EventGuide\Events;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package EventGuide\Events
 */
class Event extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stands()
    {
        return $this->hasMany('EventGuide\Stands\Stand');
    }
}