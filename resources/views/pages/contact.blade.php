@extends('layouts.main')
@section('content')
@if(Auth::check())
<div id="viewTop" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <span id="contactHeader">Contact Information:</span>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>Schaufelberger Dimitrij</td>
                                </tr>
                                <tr>
                                    <th>Adress:</th>
                                    <td>St. Gallerstrasse 25<br>9400 Rorschach</td>
                                </tr>
                                <tr>
                                    <th>E-Mail:</th>
                                    <td>diamond1826@hotmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div class="panel-footer">
                    Location:
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function initMap() {
        var location = {lat: 47.478238, lng: 9.485080};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: location
        });
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP9XGjwa6yemZn437vebzZK1HDk3l-Yok&callback=initMap">
</script>
@endif 
@if(Auth::guest())
    <div id="viewTop" class="row firstlog">
      <div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-5 col-lg-3 col-lg-offset-4 col-sm-offset-3 ">
        <a href="{{ route('login') }}" class="btn btn-block btn-default" style="margin-top:100px;">Please log in</a> 
      </div>
    </div>
    @endif 
@endsection