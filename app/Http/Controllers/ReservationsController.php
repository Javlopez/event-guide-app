<?php

namespace App\Http\Controllers;

use EventGuide\Events\Repositories\EventInterface;
use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use EventGuide\Reservations\Repositories\ReservationInterface;
use EventGuide\Stands\Repositories\StandInterface;
use App\Http\Requests\CreateReservationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class ReservationsController
 * @package App\Http\Controllers
 * @author Javier Lopez Lopez <sjavierlopez@gmail.com>
 */
class ReservationsController extends Controller
{
    /**
     * @var StandInterface
     */
    protected $stand;

    const UPLOAD_LOGOS = "/../public/uploads/logos/";

    const UPLOAD_DOCUMENTS = "/../public/uploads/document/";

    /**
     * @var
     */
    protected $reservation;

    public function __construct(StandInterface $stand, ReservationInterface $reservation)
    {
        $this->stand = $stand;
        $this->reservation = $reservation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $stand = $this->stand->getStand($id);
        if($stand->status == 1) {
            abort(422, 'This stand has been sold');
        }
        return view('reservations.create', compact('stand'));
    }

    /**
     * @param Request $request
     * @param $nameFile
     * @return string
     */
    private function getNameImage(Request $request, $nameFile)
    {
        $name = sha1($request->file($nameFile)->getClientOriginalName(). uniqid());
        return $name . "." .$request->file($nameFile)->getClientOriginalExtension();
    }

    /**
     * @param UploadedFile $image
     * @param $destination
     * @return \Intervention\Image\Image
     */
    protected function uploadImage(UploadedFile $image, $destination)
    {
        return Image::make($image)->resize(100, 50)->save(app_path() . self::UPLOAD_LOGOS . $destination);
    }

    /**
     * @param UploadedFile $document
     * @param $documentName
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    protected function uploadDocument(UploadedFile $document, $documentName)
    {
        return $document->move(app_path() . self::UPLOAD_DOCUMENTS, $documentName);
    }

    /**
     * @param CreateReservationRequest $request
     * @return mixed
     */
    public function store(CreateReservationRequest $request)
    {
        $stand = $this->stand->getStand($request->input('stand'));
        $imageName = $this->getNameImage($request, 'logo');
        $documentName = $this->getNameImage($request, 'documents');
        $image = $request->file('logo');
        $document = $request->file('documents');

        $this->uploadImage($image, $imageName);
        $this->uploadDocument($document,$imageName);


        $reservation = $this->reservation->createReservation($request->all());
        $reservation->logo = $imageName;
        $reservation->documents = $documentName;
        $stand->status = 1;
        $stand->save();
        $reservation
            ->stand()
            ->associate($stand)
            ->save();


        Session::flash('success', 'You booking was successfully');
        //return redirect()->route('event.show', [$stand->event_id]);
    }

}
