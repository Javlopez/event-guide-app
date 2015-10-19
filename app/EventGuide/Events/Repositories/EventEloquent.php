<?php
namespace EventGuide\Events\Repositories;

use EventGuide\Events\Event;
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
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getEvents()
    {
        return $this->getModel()->all();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getEventById($id)
    {
        return $this->getModel()->with('stands', 'stands.reservation')->find($id);
    }
}
