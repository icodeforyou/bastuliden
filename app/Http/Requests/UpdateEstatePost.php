<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateEstatePost extends Request {

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
            "address" => "required",
            "postalcode" => "required|numeric",
            "city" => "required",
            "property_nbr" => "required",
            "connections" => "required",
            "lat" => "required",
            "lon" => "required"
        ];
    }

}
