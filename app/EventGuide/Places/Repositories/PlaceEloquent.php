<?php
namespace EventGuide\Places\Repositories;

use EventGuide\Places\Place;

/**
 * Class PlaceEloquent
 * @package EventGuide\Places\Repositories
 */
class PlaceEloquent implements PlaceInterface
{
    protected $model;

    /**
     * @param Place $model
     */
    public function __construct(Place $model)
    {
        $this->model = $model;
    }

    /**
     * @return Place
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPlaces()
    {
        return $this->model->all();
    }
}