<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        return view('pages.index');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function mieter()
    {
        return view('pages.mieter');
    }

    public function liegenschaft()
    {
        return view('pages.liegenschaften');
    }

     public function wohnungen($liegenschaftID)
    {
        return view('pages.wohnungen', ['liegenschaftID'=>$liegenschaftID]);
    }

    public function addMieter()
    {
        return view('pages.addMieter');
    }

    public function addLiegenschaft()
    {
        return view('pages.addLiegenschaft');
    }

    public function addWohnung($liegenschaftID)
    {
        return view('pages.addWohnung', ['liegenschaftID' => $liegenschaftID]);
    }

    public function login() 
    {
        return view('auth.login');
    }
    
    public function registry() 
    {
        return view('auth.register');
    }
}
