<?php
namespace EventGuide\Places;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 * @package EventGuide\Places
 */
class Place extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function events()
    {
        return $this->hasMany('EventGuide\Events\Event');
    }
}
