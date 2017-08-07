<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mieter;
use App\WohnungenMieter;
/**
* @author D. Schaufelberger
* @since July, 2017
* @version 1.0
* this class includes all Mieter methods
*/
class MieterController extends Controller
{   
    /**
    *this method create a new Mieter and save this to Database
    *@var $request
    */
    public function createMieter(Request $request)
    {
        $mieter = new Mieter;
    
        $mieter->nachname = $request ->input('nachname');
        $mieter->vorname = $request ->input('vorname');
        $mieter->strasse = $request ->input('strasse');
        $mieter->plz = $request ->input('plz');
        $mieter->ort = $request ->input('ort');
        $mieter->tel = $request ->input('tel');
        $mieter->email = $request ->input('email');
        $mieter->save();

        return redirect()->action('PageController@mieter');
    }
    /**
    *this method returns the selected Mieter Data
    *@var $mieterID
    */
    public function selectedMieter($mieterID)
    {
        $mieters = Mieter::WHERE('mieterID', $mieterID)->get();
        $selectedMieter;

        foreach ($mieters as $mieter) {
            $selectedMieter = $mieter;   
        }      

        return view('pages.editMieter', ['selectedMieter' => $selectedMieter]);
    } 
    /**
    *this method update the selected Mieter Data
    *@var $request
    */
    public function updateMieter(Request $request)
    {
        $mieterID = $request -> input('mieterID');
        $tel = $request -> input('tel');
        $firstname = $request -> input('firstname');
        $lastname = $request -> input('lastname');
        $email = $request -> input('email');
        $street = $request -> input('street');
        $plz = $request -> input('plz');
        $city = $request -> input('city');

    Mieter::WHERE('mieterID', $mieterID)
            ->update(['vorname' => $firstname,
                    'nachname' => $lastname,
                    'strasse' => $street,
                    'plz' => $plz,
                    'ort' => $city,
                    'email' => $email,
                    'tel' => $tel]);
                                                
        return redirect()->action('PageController@mieter');
    }
    /**
    *this method delete the selected Mieter from Database
    *@var $mieterID
    */
    public function deleteMieter($mieterID)
    {
        Mieter::WHERE('mieterID', $mieterID)->delete();

        WohnungenMieter::WHERE('mieterID', $mieterID)->delete();

        return redirect()->action('PageController@mieter');
    }
}
