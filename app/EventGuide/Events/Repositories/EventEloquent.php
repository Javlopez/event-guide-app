<?php
namespace EventGuide\Events\Repositories;

use App\Events\Event;
use EventGuide\AbstractRepository;

/**
 * Class PlaceEloquent
 * @package EventGuide\Places\Repositories
 */
class EventEloquent extends AbstractRepository implements EventInterface
{

    /**
     * @param Event $model
     */
    public function __construct(
        Event $model
    ){
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getEvents()
    {
        return $this->getModel()->all();
    }
}