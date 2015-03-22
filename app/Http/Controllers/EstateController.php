<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreEstatePost;
use App\Models\Estates;
use Illuminate\Http\Request;

class EstateController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstatePost $estatePost
     * @param Estates $estates
     * @return Response
     */
    public function store(StoreEstatePost $estatePost, Estates $estates)
    {
        $estates->create($estatePost->except("_token"));

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $estateId
     * @param StoreEstatePost $request
     * @param Estates $estates
     * @return Response
     */
    public function update($estateId, StoreEstatePost $request, Estates $estates)
    {
        $estates->find($estateId)->update([
            "address" => $request->input("address"),
            "postalcode" => $request->input("postalcode"),
            "city" => $request->input("city"),
            "property_nbr" => $request->input("property_nbr"),
            "connections" => $request->input("connections"),
            "lat" => $request->input("lat"),
            "lon" => $request->input("lon")
        ]);

        return redirect("/users/edit/" . $request->input("user_id"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
