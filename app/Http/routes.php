<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\UserController;
use App\Models\Estates;
use App\Models\Proceedings;

Route::controllers([
    "auth" => "Auth\\AuthController",
    "password" => "Auth\\PasswordController",
]);

get("/", function() {
    return view("welcome")->with(["estates" => Estates::all()->toArray(), "latestProtocol" => Proceedings::latestProtocol()->take(1)->get()]);
});

$router->group(["middleware" => "auth"], function($router) {

    get("/user", function(UserController $userController) {
        return $userController->show(Auth::User()->id);
    });

    get("users/edit/{user_id}", "UserController@edit");

    post("users/edit/{user_id}", "UserController@update");
    post("estates/edit/{estate_id}", "EstateController@update");
    post("estates/create/", "EstateController@store");

});


$router->group(["middleware" => ["auth", "admin"]], function($router) {

    get("users", "UserController@index");
    get("users/new", "UserController@create");
    get("users/{user_id}", "UserController@show");
    get("emails/new", "EmailController@create");
    get("emails/edit/{email_id}", "EmailController@edit");
    get("emails", "EmailController@index");
    get("emails/send/{email_id}", "EmailController@send");

    get("proceedings", "ProceedingsController@index");
    get("proceedings/new", "ProceedingsController@create");
    get("proceedings/edit/{proceeding_id}", "ProceedingsController@edit");

    post("users/new", "UserController@store");
    post("emails/new", "EmailController@store");
    post("emails/edit/{email_id}", "EmailController@update");
    post("proceedings/new", "ProceedingsController@store");
    post("proceedings/edit/{proceeding_id}", "ProceedingsController@update");

    get("users/{user_id}/confirm-interest", "UserController@confirmInterest");
    get("users/{user_id}/cancel-interest", "UserController@cancelInterest");

});

get("emails/view/{email_id}", "EmailController@show");
get("proceedings/view/{proceeding_id}", "ProceedingsController@show");

// API routes
$router->group(["prefix" => "/api/v1", "namespace" => "Api"], function($router) {

    get("interested", "InterestedController@index");
    get("kml", "ExporterController@kml");

});