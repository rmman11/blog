@extends('front-end.layouts.app')
@section('title', 'About')
@section('content')

<div class="container"  style="background: #fff">
    <p><b> Today is: {{ $today }} </b></p>
    <div class="row justify-content-center"  style="background: #fff; padding: 10px">


<div style="float:left; width:30%">

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
 It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
 It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
  with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</div>



    <div id="map" style="width:600px;height:400px;"></div>
    <script>
function myMap() {
  var Mures = new google.maps.LatLng(46.5379237,24.5886);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {

	  center: Mures, zoom: 18,
	   zoomControl: true,
	 mapTypeId: google.maps.MapTypeId.HYBRID,
     mapTypeControlOptions: {

      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
      position: google.maps.ControlPosition.TOP_CENTER
    }

  };
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:Mures});
  marker.setMap(map);




  var infowindow = new google.maps.InfoWindow({
    content: "Targu Mures Romania"
  });
  infowindow.open(map,marker);
}
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAziTn1gXKOaj7ciRCRgxCjmWHljJNiCFM&callback=myMap"></script>
  </div>
  </div>

@endsection
