<?php
namespace EventGuide\Stands\Repositories;

use EventGuide\Stands\Stand;

/**
 * Interface StandInterface
 * @package EventGuide\Stands\Repositories
 */
interface StandInterface
{
    /**
     * @param $id
     * @return Stand
     */
    public function getStand($id);
}
