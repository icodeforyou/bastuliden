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

use App\Models\User;

Route::get("home", "HomeController@index");

Route::controllers([
    "auth" => "Auth\AuthController",
    "password" => "Auth\PasswordController",
]);
/*
get("/", ['middleware' => 'auth', function() {
   return view("home");
}]);
*/

$router->group(["middleware" => "auth"], function($router) {
    
    get("users/new", "UserController@create");
    get("users/edit/{user_id}", "UserController@edit");
    get("/", "UserController@index");
    get("users/{user_id}", "UserController@show");
    
    get("emails/new", "EmailController@create");
    get("emails/edit/{email_id}", "EmailController@edit");
    get("emails", "EmailController@index");
    get("emails/send/{email_id}", "EmailController@send");

    post("users/{user_id}/new-payment", "PaymentController@store");
    post("users/new", "UserController@store");
    post("users/edit/{user_id}", "UserController@update");
    post("estates/edit/{estate_id}", "EstateController@update");
    post("emails/new", "EmailController@store");
    post("emails/edit/{email_id}", "EmailController@update");

});



// API routes
$router->group(["prefix" => "/api/v1", "namespace" => "Api"], function($router) {
    get("interested", "InterestedController@index");
});