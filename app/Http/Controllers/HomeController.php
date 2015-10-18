<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers
 * @author Javier Lopez Lopez <sjavierlopez@gmail.com>
 */
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $places = array(
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
        );
        return view('home.index', compact('places'));
    }

}
