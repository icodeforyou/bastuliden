<?php 

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Estates;

use Illuminate\Http\Request;


class InterestedController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Estates $estates)
	{
		$estates = $estates->with("user")->get()->sortBy("address");
        return $estates;
	}


}
