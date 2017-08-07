<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Wohnung;
use App\WohnungMieter;
/**
* @author D. Schaufelberger
* @since July, 2017
* @version 1.0
* this class includes all Wohnung methods
*/
class WohnungController extends Controller
{   
    /**
    *this method create a new Wohnung and save this to Database
    *@var $request
    */
    public function createWohnung(Request $request)
    {
        $wohnung = new Wohnung;    
        $wohnung->name = $request ->input('name');
        $wohnung->miete = $request ->input('miete');
        $wohnung->liegenschaftID = $request ->input('liegenschaftID');
        $wohnung->save();

        $selectedLiegenschaft = $request->input('liegenschaftID');

        return redirect()->action('PageController@wohnungen', ['selectedLiegenschaft' => $selectedLiegenschaft]);
    }
    /**
    *this method find a specific mieter on wohnungmieter table and return him with all data from mieter table
    *@var $wohnungID
    */
    public static function findMieter($wohnungID) 
    {
       $mieters = DB::select('SELECT mieter.mieterID, mieter.nachname, mieter.vorname, mieter.strasse, mieter.plz, mieter.ort, mieter.email, mieter.tel, wohnungenmieter.wohnungsID FROM mieter, wohnungenmieter WHERE wohnungenmieter.wohnungsID = ? AND mieter.mieterID = wohnungenmieter.mieterID',[$wohnungID]);
       return $mieters;
    }
    /**
    *this method set a selected Mieter to a Wohnung
    *@var $request
    */
    public function mieterToWohnung(Request $request) 
    {
        $validation = DB::select('SELECT * FROM wohnungenmieter WHERE mieterID = ? AND wohnungsID = ?', [$request->input('mieterID'), $request->input('wohnungsID')]);
        if (empty($validation)) {
    
            $mieterToWohnung = new WohnungMieter;    
            $mieterToWohnung->wohnungsID = $request ->input('wohnungsID');
            $mieterToWohnung->mieterID = $request ->input('mieterID');
            $mieterToWohnung->save();
    
                $selectedWohnung = $request->input('wohnungsID');
                $selectedLiegenschaft = 0;
    
            return redirect()->action('PageController@wohnungen', ['selectedLiegenschaft'=>$selectedLiegenschaft]);
        } else {
            $selectedLiegenschaft = 0;
    
            return redirect()->action('PageController@wohnungen', ['selectedLiegenschaft'=>$selectedLiegenschaft]);
        }
    }
    /**
    *this method delete a selected Mieter from Wohnung
    *@var $request
    */
    public function mieterentfernen(Request $request)
    {
        DB::delete('DELETE FROM wohnungenMieter WHERE mieterID = ? AND wohnungsID = ?', [$request->mieterID, $request->wohnungsID]);

        $selectedLiegenschaft = 0;
    
        return redirect()->action('PageController@wohnungen', ['selectedLiegenschaft'=>$selectedLiegenschaft]);
    }
    /**
    *this method returns all data from a selected Wohnung
    *@var $wohnungsID
    */
    public function selectedWohnung($wohnungsID)
    {
        $wohnungs = Wohnung::WHERE('wohnungsID', $wohnungsID)->get();
        $selectedWohnung;

        foreach ($wohnungs as $wohnung) {
            $selectedWohnung = $wohnung;   
        }      

        return view('pages.editWohnung', ['selectedWohnung' => $selectedWohnung]);
    } 
    /**
    *this method update the Wohnung Data for a selected Wohnung
    *@var $request
    */
    public function updateWohnung(Request $request)
    {
        $wohnungsID = $request -> input('wohnungsID');
        $name = $request -> input('name');
        $miete = $request -> input('miete');
        $liegenschaftID = $request -> input('liegenschaftID');

    Wohnung::WHERE('wohnungsID', $wohnungsID)
            ->update(['name' => $name,
                    'miete' => $miete,
                    'liegenschaftID' => $liegenschaftID]);
                                                
        $selectedLiegenschaft = 0;
    
        return redirect()->action('PageController@wohnungen', ['selectedLiegenschaft'=>$selectedLiegenschaft]);
    }
    /**
    *this method delete a selected Wohnung from database
    *@var $request
    */
    public function deleteWohnung($wohnungsID)
    {
        Wohnung::WHERE('wohnungsID', $wohnungsID)->delete();

        WohnungMieter::WHERE('wohnungsID', $wohnungsID)->delete();

        $selectedLiegenschaft = 0;
    
        return redirect()->action('PageController@wohnungen', ['selectedLiegenschaft'=>$selectedLiegenschaft]);
    }
}
