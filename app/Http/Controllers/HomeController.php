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

    protected $place;

    public function __construct(PlaceInterface $place)
    {
        $this->place = $place;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $places = json_encode($this->place->getPlaces());

        //[{"id":1,"name":"Stanford Stadium","latitude":"37.43457","longitude":"-122.16119",
        //"events":[{"id":1,"place_id":1,"name":"Sport Forum","description":"The forum","date":"2015-11-11","stands":14},{"id":2,"place_id":1,"name":"The legends","description":"Expo with legends","date":"2015-12-11","stands":14}]},{"id":2,"name":"Stanford Memorial Auditorium","latitude":"37.42887","longitude":"-122.16652","events":[{"id":3,"place_id":2,"name":"Expo html5","description":"companies and experts in HTML5","date":"2015-11-01","stands":14},{"id":4,"place_id":2,"name":"Expo Ruby5","description":"Jetbrains, Amazon, Rackspace, among others","date":"2015-11-10","stands":14},{"id":5,"place_id":2,"name":"Expo JEE","description":"Java in the industry","date":"2015-11-14","stands":14}]},{"id":3,"name":"Lucile Packard Children's Hospital Stanford","latitude":"37.43587","longitude":"-122.17488","events":[{"id":6,"place_id":3,"name":"The IT  in the Health","description":"Several companies presenting their products of health","date":"2015-11-20","stands":14}]}]<!DOCTYPE html>
        /*$places = array(
            [
                'name' => 'Las vegas',
                'id' => 1,
                'latitude' => '37.400165',
                'longitude' => '-5.993729',
                'events' => array(
                    ['event' => 'PHP conference', 'date' => '1/1/2016','id' => 1],
                    ['event' => 'Ruby conference', 'date' => '1/1/2016','id' => 2]
                ),
            ],

            [
                'name' => 'Apple',
                'id' => 2,
                'latitude' => '37.266949',
                'longitude' => '-6.949539',
                'events' => array(
                    ['event' => 'Swift conference', 'date' => '1/1/2016','id' => 3],
                    ['event' => 'C++ conference', 'date' => '1/1/2016','id' => 4]
                ),
            ],
        );*/
        return view('home.index', compact('places'));
    }

}
