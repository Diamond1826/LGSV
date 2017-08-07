@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Willkommen zu LGSV Plus</div>

                <div class="panel-body">
                    <span id="textLoggedIn">You are logged in!</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif 
@if(Auth::guest())
    <div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Willkommen zu LGSV Plus</div>

                <div class="panel-body">
                    Log in to use it!
                </div>
            </div>
        </div>
    </div>
</div>
@endif 
@endsection
