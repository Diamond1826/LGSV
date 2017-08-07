@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liegenschaft bearbeiten</div>
                <div class="panel-body">              
                    {{ Form::open(['url' => '/updateLiegenschaft', 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Sind Sie sicher?")']) }}
                      <div class="form-group">
                        {{ Form::label('name', 'Name:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('name', $selectedLiegenschaft->name, ['class' => 'form-control']) }}
                          {{ Form::text('liegenschaftID', $selectedLiegenschaft->liegenschaftID, array('class' => 'form-control','style' => 'display: none;')) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('street', 'Strasse:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('street', $selectedLiegenschaft->strasse, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('plz', 'PLZ:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('plz', $selectedLiegenschaft->plz, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('city', 'Ort:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::text('city', $selectedLiegenschaft->ort, ['class' => 'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          {{ Form::submit('Speichern', ['class' => 'btn btn-default']) }}
                          <a href="/deleteLiegenschaft/{{ $selectedLiegenschaft->liegenschaftID }}" onclick="return confirm('Sind Sie sicher?')" class="btn btn-default">Liegenschaft löschen</a>
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