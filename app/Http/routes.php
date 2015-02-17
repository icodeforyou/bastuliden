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
    get("kml", function(\App\Models\Estates $estates) {

        $e = $estates->get();

        /*
          <?xml version="1.0" encoding="UTF-8"?>
            <kml xmlns="http://www.opengis.net/kml/2.2">
              <Placemark>
                <name>Simple placemark</name>
                <description>Attached to the ground. Intelligently places itself
                   at the height of the underlying terrain.</description>
                <Point>
                  <coordinates>-122.0822035425683,37.42228990140251,0</coordinates>
                </Point>
              </Placemark>
            </kml>
         */

        $string = '<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://earth.google.com/kml/2.1">';
        foreach($e as $f) {

            $string .= "<Placemark>
                <name>" . $f->address ."</name>
                <description>Lorem ipsum</description>
                <Point>
                  <coordinates>" . $f->lat . "," . $f->lon ."</coordinates>
                </Point>
              </Placemark>";

            }

            $string .= "</kml>";

        Storage::put("oktorp.kml", $string);

        return response()->download(storage_path("app/oktorp.kml"), "oktorp.kml", ["Content-Type" => "application/xml"]);


    });
});