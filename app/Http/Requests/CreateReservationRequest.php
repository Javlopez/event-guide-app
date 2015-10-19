<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateReservationRequest
 * @package App\Http\Requests
 */
class CreateReservationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'stand' => 'required|int',
            'name' => 'required',
            'email' => 'email',
            'logo' => 'required|image|mimes:jpeg,png|max:5120',
            'documents' => 'required|mimes:zip,pdf|max:20120'
        ];
    }
}