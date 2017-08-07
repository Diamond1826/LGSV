@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mieter bearbeiten</div>
                <div class="panel-body">              
                    {{ Form::open(['url' => '/updateMieter', 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Sind Sie sicher?")']) }}
                      <div class="form-group">
                        {{ Form::label('fistname', 'Vorname:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('firstname', $selectedMieter->vorname, ['class' => 'form-control']) }}
                          {{ Form::text('mieterID', $selectedMieter->mieterID, array('class' => 'form-control','style' => 'display: none;')) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('lastname', 'Nachname:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('lastname', $selectedMieter->nachname, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('street', 'Strasse:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('street', $selectedMieter->strasse, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('plz', 'PLZ:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('plz', $selectedMieter->plz, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('city', 'Ort:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('city', $selectedMieter->ort, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('email', 'E-Mail:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::email('email', $selectedMieter->email, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('tel', 'Telefon:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('tel', $selectedMieter->tel, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          {{ Form::submit('Speichern', ['class' => 'btn btn-default']) }}
                          <a href="/deleteMieter/{{ $selectedMieter->mieterID }}" onclick="return confirm('Sind Sie sicher?')" class="btn btn-default">Mieter löschen</a>
                        </div>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif 
@if(Auth::guest())
    <div class="row firstlog">
      <div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-5 col-lg-3 col-lg-offset-4 col-sm-offset-3 ">
        <a href="{{ route('login') }}" class="btn btn-block btn-default" style="margin-top:100px;">Please log in</a> 
      </div>
    </div>
    @endif 
@endsection