<?php
namespace EventGuide\Controllers\Tests;

use Mockery as M;

class EventsControllerTest extends \TestCase
{
    protected $eventsRepository;

    protected $eventsController;

    public function setUp()
    {
        parent::setup();
        $this->eventsRepository = M::mock('EventGuide\Events\Repositories\EventEloquent');
        $this->eventsController  = new \App\Http\Controllers\EventsController($this->eventsRepository);
    }

    public function testShowEvents()
    {
        $this->eventsRepository->shouldReceive('getEventById')->once()->andReturn(array());
        $response = $this->eventsController->show(1);
        $this->assertTrue(is_object($response));
    }

    public function tearDown()
    {
        M::close();
        parent::tearDown();
    }
}
