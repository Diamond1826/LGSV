@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Mieter Liste</div>
                    <a class="btn btn-default btn-block" href="/addMieter">Mieter erfassen</a>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Mieter ID</th>
                                    <th>Nachname</th>
                                    <th>Vorname</th>
                                    <th>Strasse</th>
                                    <th>PLZ</th>
                                    <th>Ort</th>
                                    <th>Telefon</th>
                                    <th>E-Mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mieters = \App\Mieter::all() as $mieter) 
                                        <tr class="clickable-row" data-href="/editMieter/{{ $mieter->mieterID }}">
                                            <td>{{ $mieter->mieterID }}</td>
                                            <td>{{ $mieter->nachname }}</td>
                                            <td>{{ $mieter->vorname }}</td>
                                            <td>{{ $mieter->strasse }}</td>
                                            <td>{{ $mieter->plz }}</td>
                                            <td>{{ $mieter->ort }}</td>
                                            <td>{{ $mieter->tel }}</td>
                                            <td>{{ $mieter->email }}</td>
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
@endif 
@if(Auth::guest())
    <div class="row firstlog">
      <div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-5 col-lg-3 col-lg-offset-4 col-sm-offset-3 ">
        <a href="{{ route('login') }}" class="btn btn-block btn-default" style="margin-top:100px;">Please log in</a> 
      </div>
    </div>
    @endif 
@endsection