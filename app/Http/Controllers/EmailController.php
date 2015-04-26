<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\User;
use App\Http\Requests\StoreEmailPost;

use Illuminate\Http\Request;

use Mail;
use Carbon;

class EmailController extends Controller {

    /**
     * @var Email
     */
    private $email;

    public function __construct(Email $email) {
        $this->email = $email;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("emails", ["emails" => $this->email->get()->sortByDesc("created_at")]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(User $user)
    {
        $users = $user->visible()->get();

        $usersWithEmail = $users->filter(function($user) {
            return strlen($user->email)>0 ? $user : false;
        });

        return view("email", ["users" => $usersWithEmail]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreEmailPost $request)
    {
        $this->email->create([
            "email_content" => $request->input("email"),
            "subject" => $request->input("subject"),
            "recipients" => $request->input("recipients")
        ]);

        return redirect("/emails");
    }

    /**
     * @param $Id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send($Id)
    {
        $email = $this->email->find($Id);

        $res = Mail::send("emails.newsletter", ["email" => $email->email_content], function ($message) use ($email) {
            $message->from("fiber@oktorp.se");
            $message->replyTo("fiber@oktorp.se");
            $message->to($email->recipients)->subject($email->subject);
        });

        $email->update([
            "sentout_at" => app("Carbon\\Carbon")
        ]);
        
        return redirect("/emails");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view("view_email", ["email" => $this->email->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $Id
     * @param User $user
     * @return Response
     * @internal param int $id
     */
    public function edit($Id, User $user)
    {
        $users = $user->visible()->get();

        $usersWithEmail = $users->filter(function($user) {
            return strlen($user->email)>0 ? $user : false;
        });

        return view("email", ["users" => $usersWithEmail, "email" => $this->email->find($Id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $Id
     * @param StoreEmailPost $request
     * @return Response
     * @internal param int $id
     */
    public function update($Id, StoreEmailPost $request)
    {

        $this->email->find($Id)->update([
            "email_content" => $request->input("email"),
            "subject" => $request->input("subject"),
            "recipients" => $request->input("recipients")
        ]);

        return redirect("/emails");
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
