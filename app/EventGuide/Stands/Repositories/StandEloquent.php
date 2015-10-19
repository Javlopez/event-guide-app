<?php
namespace EventGuide\Stands\Repositories;

use EventGuide\AbstractRepository;
use EventGuide\Stands\Stand;

/**
 * Class PlaceEloquent
 * @package EventGuide\Places\Repositories
 */
class StandEloquent extends AbstractRepository implements StandInterface
{
    /**
     * @param Stand $model
     */
    public function __construct(Stand $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getStand($id)
    {
        return $this->getModel()->find($id);
    }
}
