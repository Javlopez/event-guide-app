<?php
namespace EventGuide;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository
 * @package EventGuide
 */
abstract class AbstractRepository
{
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
}
