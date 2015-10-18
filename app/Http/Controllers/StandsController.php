<?php

namespace App\Http\Controllers;

use EventGuide\Events\Repositories\EventInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use EventGuide\Stands\Repositories\StandInterface;

/**
 * Class StandsController
 * @package App\Http\Controllers
 * @author Javier Lopez Lopez <sjavierlopez@gmail.com>
 */
class StandsController extends Controller
{
    /**
     * @var StandInterface
     */
    protected $stand;

    public function __construct(StandInterface $stand)
    {
        $this->stand = $stand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stand = $this->stand->getStand($id);
        return view('stands.show', compact('stand'));
    }

}
