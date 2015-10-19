<?php

namespace App\Http\Controllers;

use EventGuide\Events\Repositories\EventInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers
 * @author Javier Lopez Lopez <sjavierlopez@gmail.com>
 */
class EventsController extends Controller
{
    /**
     * @var EventInterface
     */
    protected $event;

    public function __construct(EventInterface $event)
    {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->event->getEventById($id);
        return view('events.show', compact('event'));
    }
}
