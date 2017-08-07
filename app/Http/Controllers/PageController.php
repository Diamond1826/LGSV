<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        return view('pages.index');
    }
    /**
    * this method returns the contact view
    * @return contact.blade.php
    */
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

    /**
    * this method returns the login view
    * @return login.blade.php
    */
    public function login() 
    {
        return view('auth.login');
    }
    /**
    * this method returns the register view
    * @return register.blade.php
    */
    public function registry() 
    {
        return view('auth.register');
    }
}
