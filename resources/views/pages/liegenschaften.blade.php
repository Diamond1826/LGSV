@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Liegenschaften Liste</div>
                    <a class="btn btn-default btn-block" href="/addLiegenschaft">Liegenschaft erfassen</a>
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
                                        <tr class="clickable-row" data-href="/editLiegenschaft/{{ $liegenschaft->liegenschaftID }}">
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
@endif 
@if(Auth::guest())
    <div class="row firstlog">
      <div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-5 col-lg-3 col-lg-offset-4 col-sm-offset-3 ">
        <a href="{{ route('login') }}" class="btn btn-block btn-default" style="margin-top:100px;">Please log in</a> 
      </div>
    </div>
    @endif 
@endsection