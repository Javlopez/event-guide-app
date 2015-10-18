<?php
namespace EventGuide\Places\Repositories;

use EventGuide\AbstractRepository;
use EventGuide\Places\Place;

/**
 * Class PlaceEloquent
 * @package EventGuide\Places\Repositories
 */
class PlaceEloquent extends AbstractRepository implements PlaceInterface
{

    /**
     * @param Place $model
     */
    public function __construct(Place $model)
    {
        parent::__construct($model);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPlaces()
    {
        return $this->model->with('events')->get();
    }
}