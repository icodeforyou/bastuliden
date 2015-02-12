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

get("/", ['middleware' => 'auth', function() {
   return view("home");
}]);

get("users", ['middleware' => 'auth', function () {
    $users = User::Visible()->with("payments")->get()->sortBy("address");
    return view("users", ["users" => $users]);
}]);

get("users/{user_id}", ['middleware' => 'auth', function($user_id) {
   return $user_id;
}]);