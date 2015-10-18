<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use EventGuide\Places\Repositories\PlaceInterface;

/**
 * Class HomeController
 * @package App\Http\Controllers
 * @author Javier Lopez Lopez <sjavierlopez@gmail.com>
 */
class HomeController extends Controller
{

    /**
     * @var PlaceInterface
     */
    protected $place;

    public function __construct(PlaceInterface $place)
    {
        $this->place = $place;
    }

    /**
     * Display the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $places = json_encode($this->place->getPlaces());
        return view('home.index', compact('places'));
    }

}
