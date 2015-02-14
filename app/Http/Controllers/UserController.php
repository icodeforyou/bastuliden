<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserPost;
use App\Models\Estates;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->visible()->with(["payments", "paidSignupFee", "estates"])->get()->sortBy("address");
        return view("users", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("new_user");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserPost $request
     * @param Estates $estates
     * @throws
     * @return Response
     */
    public function store(StoreUserPost $request, Estates $estates)
    {
         $newUser = $this->user->create([
             "name" => $request->input("name"),
             "name2" => $request->input("name2"),
             "email" => $request->input("email"),
             "visible" => 1,
             "password" => Hash::make("fiber")
         ]);

        if($newUser) {
            $estate = new $estates([
                "address" => $request->input("address"),
                "postalcode" => $request->input("postalcode"),
                "city" => $request->input("city"),
                "property_nbr" => $request->input("property_nbr"),
                "connections" => $request->input("connections")
            ]);

            $newUser->estates()->save($estate);

            return redirect("/users/" . $newUser->id);
        }

        throw exception("Kunde inte skapa en ny medlem");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view("user", ["user" => $this->user->with(["payments", "paidSignupFee", "estates"])->find($id)]);
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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
