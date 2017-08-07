@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Liegenschaften Liste</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Liegenschafts ID</th>
                                    <th>Name</th>
                                    <th>Strasse</th>
                                    <th>PLZ</th>
                                    <th>Ort</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liegenschaften = \App\Liegenschaft::all() as $liegenschaft) 
                                        <tr data-toggle="modal" data-target="#modal{{ $liegenschaft->liegenschaftID }}">
                                            <td>{{ $liegenschaft->liegenschaftID }}</td>
                                            <td>{{ $liegenschaft->name }}</td>
                                            <td>{{ $liegenschaft->strasse }}</td>
                                            <td>{{ $liegenschaft->plz }}</td>
                                            <td>{{ $liegenschaft->ort }}</td>
                                        </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($liegenschaften = \App\Liegenschaft::all() as $liegenschaft)
<div id="modal{{ $liegenschaft->liegenschaftID }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Liegenschaft: {{ $liegenschaft->strasse }}</h4>
                    Anzahl Wohnungen: {{ \App\Wohnung::WHERE('liegenschaftID', $liegenschaft->liegenschaftID)->count() }}<br>
                    Gesamte Mieteinnahmen: {{ \App\Wohnung::WHERE('liegenschaftID', $liegenschaft->liegenschaftID)->sum('miete') }} CHF
            </div>
            <div class="modal-body">
                <a class="btn btn-default btn-block" href="/addWohnung/{{ $liegenschaft->liegenschaftID }}">Wohnung erfassen</a>
                <div class="table-responsive">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>Wohnungs ID</th>
                                <th>Name</th>
                                <th>Miete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wohnungen = \App\Wohnung::WHERE('liegenschaftID', $liegenschaft->liegenschaftID)->get() as $wohnung) 
                                <tr data-toggle="modal" data-target="#modalWohnung{{ $wohnung->wohnungsID }}">
                                    <td>{{ $wohnung->wohnungsID }}</td>
                                    <td>{{ $wohnung->name }}</td>
                                    <td>{{ $wohnung->miete }}</td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="container">
<!-- Modal -->
@foreach($wohnungen = \App\Wohnung::all() as $wohnung)
<div id="modalWohnung{{ $wohnung->wohnungsID }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Wohnung: {{ $wohnung->name }}</h4>
      </div>
      <div class="modal-body">
      <a class="btn btn-default btn-block" href="/editWohnung/{{ $wohnung->wohnungsID }}">Wohnung bearbeiten</a>
      <a class="btn btn-default btn-block" data-toggle="modal" data-target="#modalMieterZuweisen{{ $wohnung->wohnungsID }}">Mieter zuweisen</a>
      <a class="btn btn-default btn-block" data-toggle="modal" data-target="#modalMieterentfernen{{ $wohnung->wohnungsID }}">Mieter entfernen</a>
        <div class="table-responsive">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Mieter ID</th>
                                <th>Nachname</th>
                                <th>Vorname</th>
                                <th>Strasse</th>
                                <th>PLZ</th>
                                <th>Ort</th>
                                <th>E-Mail</th>
                                <th>Telefon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mieters = \App\Http\Controllers\WohnungController::findMieter($wohnung->wohnungsID) as $mieter) 
                                <tr>
                                    <td>{{ $mieter->mieterID }}</td>
                                    <td>{{ $mieter->nachname }}</td>
                                    <td>{{ $mieter->vorname }}</td>
                                    <td>{{ $mieter->strasse }}</td>
                                    <td>{{ $mieter->plz }}</td>
                                    <td>{{ $mieter->ort }}</td>
                                    <td>{{ $mieter->email }}</td>
                                    <td>{{ $mieter->tel }}</td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
</div>

<div class="container">
<!-- Modal -->
@foreach($wohnungen = \App\Wohnung::all() as $wohnung)
<div id="modalMieterZuweisen{{ $wohnung->wohnungsID }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mieter zuweisen</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['url' => '/mieterToWohnung', 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Sind Sie sicher?")']) }}
                        {{ Form::text('wohnungsID', $wohnung->wohnungsID, array('class' => 'form-control','style' => 'display: none;')) }}
                      <div class="form-group">
                        {{ Form::label('mieterID', 'Mieter auswählen:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::select('mieterID', [\App\Mieter::all()->pluck('nachname', 'mieterID')->toArray()],null,['class'=>'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          {{ Form::submit('Speichern', ['class' => 'btn btn-default']) }}
                        </div>
                      </div>
                    {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
</div>

<div class="container">
<!-- Modal -->
@foreach($wohnungen = \App\Wohnung::all() as $wohnung)
<div id="modalMieterentfernen{{ $wohnung->wohnungsID }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mieter entfernen</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['url' => '/mieterentfernen', 'class' => 'form-horizontal', 'onsubmit' => 'return confirm("Sind Sie sicher?")']) }}
                        {{ Form::text('wohnungsID', $wohnung->wohnungsID, array('class' => 'form-control','style' => 'display: none;')) }}
                      <div class="form-group">
                        {{ Form::label('mieterID', 'Mieter auswählen:', ['class' => 'control-label col-sm-2']) }}
                        <div class="col-sm-10">
                          {{ Form::select('mieterID', [\App\WohnungMieter::where('wohnungsID',$wohnung->wohnungsID)->pluck('mieterID', 'mieterID')->toArray()],null,['class'=>'form-control']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          {{ Form::submit('Entfernen', ['class' => 'btn btn-default']) }}
                        </div>
                      </div>
                    {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
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