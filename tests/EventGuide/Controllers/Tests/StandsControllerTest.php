<?php
namespace EventGuide\Controllers\Tests;

use Mockery as M;

class StandsControllerTest extends \TestCase
{
    protected $standsRepository;

    protected $standsController;

    public function setUp()
    {
        parent::setup();
        $this->standsRepository = M::mock('EventGuide\Stands\Repositories\StandEloquent');
        $this->standsController  = new \App\Http\Controllers\StandsController($this->standsRepository);
    }

    public function testShowStand()
    {
        $this->standsRepository->shouldReceive('getStand')->once()->andReturn(array());
        $response = $this->standsController->show(1);
        $this->assertTrue(is_object($response));
    }

    public function tearDown()
    {
        M::close();
        parent::tearDown();
    }
}
