<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Estates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExporterController extends Controller {

    /**
     * Exports the estates as a kml (xml) file
     * To be used to import to google earth
     *
     * @param Estates $estates
     * @return Response
     */
    public function kml(Estates $estates)
    {
        $allEstates = $estates->get();
        $string = '<?xml version="1.0" encoding="UTF-8"?>
    <kml xmlns="http://www.opengis.net/kml/2.2">
        <Document><Folder>';

        foreach($allEstates as $estate) {
            $string .= "\n<Placemark>
    <name>" . $estate->address ."</name>
    <description>" . $estate->property_nbr ."</description>
    <Point>
        <coordinates>" . $estate->lat . "," . $estate->lon .",0</coordinates>
    </Point>
</Placemark>";
        }

        $string .= "</Folder></Document></kml>";

        Storage::put("oktorp.kml", $string);

        return response()->download(storage_path("app/oktorp.kml"), "oktorp.kml", ["Content-Type" => "application/xml"]);
    }

}
