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
get("users/new", ['middleware' => 'auth', "uses" => "UserController@create"]);
get("users/edit/{user_id}", ['middleware' => 'auth', "uses" => "UserController@edit"]);
get("/", ['middleware' => 'auth', "uses" => "UserController@index"]);
get("users/{user_id}", ["middleware" => "auth", "uses" => "UserController@show"]);

post("users/{user_id}/new-payment", ["middleware" => "auth", "uses" => "PaymentController@store"]);
post("users/new", ['middleware' => 'auth', "uses" => "UserController@store"]);
post("users/edit/{user_id}", ['middleware' => 'auth', "uses" => "UserController@update"]);
post("estates/edit/{estate_id}", ['middleware' => 'auth', "uses" => "EstateController@update"]);

// API routes
$router->group(["prefix" => "/api/v1", "namespace" => "Api"], function($router) {
    get("interested", "InterestedController@index");
});