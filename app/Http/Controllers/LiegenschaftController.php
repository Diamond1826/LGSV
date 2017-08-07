<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Liegenschaft;
use App\Wohnung;
use App\WohnungMieter;
/**
* @author D. Schaufelberger
* @since July, 2017
* @version 1.0
* this class includ all student and classes methods
*/
class LiegenschaftController extends Controller
{   
    public function createLiegenschaft(Request $request)
    {
        $liegenschaft = new Liegenschaft;
    
        $liegenschaft->name = $request ->input('name');
        $liegenschaft->strasse = $request ->input('strasse');
        $liegenschaft->plz = $request ->input('plz');
        $liegenschaft->ort = $request ->input('ort');
        $liegenschaft->save();

        return redirect()->action('PageController@liegenschaft');
    }

    public function selectedLiegenschaft($liegenschaftID)
    {
        $liegenschafts = Liegenschaft::WHERE('liegenschaftID', $liegenschaftID)->get();
        $selectedLiegenschaft;

        foreach ($liegenschafts as $liegenschaft) {
            $selectedLiegenschaft = $liegenschaft;   
        }      

        return view('pages.editliegenschaft', ['selectedLiegenschaft' => $selectedLiegenschaft]);
    } 

    public function updateLiegenschaft(Request $request)
    {
        $liegenschaftID = $request -> input('liegenschaftID');
        $name = $request -> input('name');
        $street = $request -> input('street');
        $plz = $request -> input('plz');
        $city = $request -> input('city');

    Liegenschaft::WHERE('liegenschaftID', $liegenschaftID)
            ->update(['name' => $name,
                    'strasse' => $street,
                    'plz' => $plz,
                    'ort' => $city]);
                                                
        return redirect()->action('PageController@liegenschaft');
    }

    public function deleteLiegenschaft($liegenschaftID)
    {
        Liegenschaft::WHERE('liegenschaftID', $liegenschaftID)->delete();

        $wohnungen = Wohnung::WHERE('liegenschaftID', $liegenschaftID)->get();

        Wohnung::WHERE('liegenschaftID', $liegenschaftID)->delete();

        foreach ($wohnungen as $wohnung) {
            WohnungMieter::WHERE('wohnungsID', $wohnung->wohnungsID)->delete();
        }

        return redirect()->action('PageController@liegenschaft');
    }
}
