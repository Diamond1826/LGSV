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
* this class includes all Liegenschaft methods
*/
class LiegenschaftController extends Controller
{   
    /**
    *this method create a new Liegenschaft and save this to Database
    *@var $request
    */
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
    /**
    *this returns the selected Liegenschaft Data
    *@var $liegenschaftID
    */
    public function selectedLiegenschaft($liegenschaftID)
    {
        $liegenschafts = Liegenschaft::WHERE('liegenschaftID', $liegenschaftID)->get();
        $selectedLiegenschaft;

        foreach ($liegenschafts as $liegenschaft) {
            $selectedLiegenschaft = $liegenschaft;   
        }      

        return view('pages.editliegenschaft', ['selectedLiegenschaft' => $selectedLiegenschaft]);
    } 
    /**
    *this method update the selected Liegenschaft data on database
    *@var $request
    */
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
    /**
    *this method delete the selected Liegenschaft from Database
    *@var $liegenschaftID
    */
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
