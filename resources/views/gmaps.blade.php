@extends('layouts.admin_master')

@section('title')
  Google Map
@endsection

@section('css')

  <style type="text/css">
      #mymap {
          border:3px solid red;
          width: 1100px;
          height: 600px;
      }
  </style>
@endsection

@section('content')
  <div class="page-content-wrapper">
    <div class="page-content">
      <h1> <b> <u> Google Map </u> </b> </h1>
      <div id="mymap"> </div>
    </div>
  </div>


  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="http://maps.google.com/maps/api/js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
  <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOf-rNeUhgvzd4_ID7qbrHinVhpwGvqAM&libraries=geometry,places">
  </script>


  <script type="text/javascript">

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (p) {
            var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
            var mapOptions = {
                center: LatLng,
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("mymap"), mapOptions);
            var marker = new google.maps.Marker({
                position: LatLng,
                map: map,
                title: "<div style = 'height:60px;width:200px'><b>Your location:</b><br />Latitude: " + p.coords.latitude + "<br />Longitude: " + p.coords.longitude
            });
            google.maps.event.addListener(marker, "click", function (e) {
                var infoWindow = new google.maps.InfoWindow();
                infoWindow.setContent(marker.title);
                infoWindow.open(map, marker);
            });
        });

    }else{

        alert('Geo Location feature is not supported in this browser.');
    }

   //  var locations;
   //  var mymap = new GMaps({
   //    el: '#mymap',
   //    lat: 21.170240,
   //    lng: 72.831061,
   //    zoom:5
   //  });

   //  $.each( locations, function( index, value ){
   //    mymap.addMarker({
   //      lat: value.lat,
   //      lng: value.lng,
   //      title: value.city,
   //      click: function(e) {
   //        alert('This is '+value.city+', from India.');
   //      }
   //    });
   // });

  </script>

@endsection
