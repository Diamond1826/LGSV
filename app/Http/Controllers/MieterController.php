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
* this class includ all student and classes methods
*/
class MieterController extends Controller
{   
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

    public function selectedMieter($mieterID)
    {
        /*$mieters = DB::select("SELECT * 
                                FROM mieters 
                                WHERE mieterID = $mieterID");*/
        $mieters = Mieter::WHERE('mieterID', $mieterID)->get();
        $selectedMieter;

        foreach ($mieters as $mieter) {
            $selectedMieter = $mieter;   
        }      

        return view('pages.editMieter', ['selectedMieter' => $selectedMieter]);
    } 

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

    public function deleteMieter($mieterID)
    {
        Mieter::WHERE('mieterID', $mieterID)->delete();

        WohnungenMieter::WHERE('mieterID', $mieterID)->delete();

        return redirect()->action('PageController@mieter');
    }
}
