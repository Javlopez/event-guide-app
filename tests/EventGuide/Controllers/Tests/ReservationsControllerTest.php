<?php
namespace EventGuide\Controllers\Tests;

use Mockery as M;

class ReservationsControllerTest extends \TestCase
{
    protected $standsRepository;

    protected $reservationsRepository;

    protected $reservationsController;

    public function setUp()
    {
        parent::setup();
        $this->reservationsRepository = M::mock('EventGuide\Reservations\Repositories\ReservationEloquent');
        $this->standsRepository = M::mock('EventGuide\Stands\Repositories\StandEloquent');
        $this->reservationsController  = new \App\Http\Controllers\ReservationsController(
            $this->standsRepository,
            $this->reservationsRepository
        );
    }

    /**
     * @param int $status
     * @return M\Expectation
     */
    private function getMockStand($status = 0)
    {
        $model = M::mock('Illuminate\Database\Eloquent\Model');
        $model->shouldReceive('save')->andReturn();

        $mockStand = M::mock('EventGuide\Stands\Stand');
        $mockStand->shouldReceive('setStatus')->andReturn($status);
        $mockStand->shouldReceive('getStatus')->andReturn($status);
        $mockStand->shouldReceive('save')->andReturn($model);
        $mockStand->shouldReceive('associate')->andReturn($model);
        $mockStand->shouldReceive('getEventId')->andReturn(1);
        return $mockStand;
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function testShowCreateFormWithStandNotAvailable()
    {
        $this->standsRepository->shouldReceive('getStand')->once()->andReturn($this->getMockStand(1));
        $response = $this->reservationsController->create(1);
        $this->assertTrue(is_object($response));
    }

    public function testShowCreateFormAWithStandAvailable()
    {
        $this->standsRepository->shouldReceive('getStand')->once()->andReturn($this->getMockStand(0));

        $response = $this->reservationsController->create(100);
        $this->assertTrue(is_object($response));
    }

    public function testCreateANewReservation()
    {
        $this->standsRepository->shouldReceive('getStand')->once()->andReturn($this->getMockStand());

        $mockFile =  M::mock('Symfony\Component\HttpFoundation\File\UploadedFile');
        $mockFile->shouldReceive('getClientOriginalName')->andReturn('name');
        $mockFile->shouldReceive('getClientOriginalExtension')->andReturn('jpg');
        $mockFile->shouldReceive('move')->once()->andReturn(array());
        $mockFile->shouldReceive('getRealPath')->once()->andReturn(app_path() . '/../public/img/header-1.jpg');

        $mockReservationRequest =  M::mock('App\Http\Requests\CreateReservationRequest');
        $mockReservationRequest
            ->shouldReceive('input')
            ->once()
            ->andReturn('');

        $mockReservationRequest
            ->shouldReceive('file')
            ->andReturn($mockFile);

        $mockReservationRequest
            ->shouldReceive('all')
            ->once()
            ->andReturn(array());

        $mockReservation = M::mock('EventGuide\Reservations\Reservation');
        $mockReservation
            ->shouldReceive('setLogo')
            ->once()
            ->andReturn();

        $mockReservation
            ->shouldReceive('setDocuments')
            ->once()
            ->andReturn();

        $mockReservation
            ->shouldReceive('stand')
            ->once()
            ->andReturn($this->getMockStand());

        $this->reservationsRepository
            ->shouldReceive('createReservation')
            ->once()
            ->andReturn($mockReservation);

        $response = $this->reservationsController->store($mockReservationRequest);
        $this->assertTrue(is_object($response));
    }

    public function tearDown()
    {
        M::close();
        parent::tearDown();
    }
}