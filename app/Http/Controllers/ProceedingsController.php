<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProceedingRequest;
use App\Models\Proceedings;
use Illuminate\Http\Request;

class ProceedingsController extends Controller {

    /**
     * @var Proceedings
     */
    private $proceedings;

    public function __construct(Proceedings $proceedings) {
        $this->proceedings = $proceedings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("proceedings", ["proceedings" => $this->proceedings->all()->sortByDesc("proceedings_date")]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("new_proceeding");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProceedingRequest $proceedingRequest
     * @return Response
     */
    public function store(StoreProceedingRequest $proceedingRequest)
    {
        $this->proceedings->create($proceedingRequest->all());

        return redirect("/proceedings");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view("view_proceeding", ["proceeding" => $this->proceedings->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view("new_proceeding", ["proceeding" => $this->proceedings->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $Id
     * @param StoreProceedingRequest $request
     * @return Response
     * @internal param int $id
     */
    public function update($Id, StoreProceedingRequest $request)
    {
        $this->proceedings->find($Id)->update($request->all());

        return redirect("/proceedings/edit/" . $Id);
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
