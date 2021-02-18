<?php
session_start();
include 'Index.php';
?>
<!DOCTYPE html>
<html>
<body>

    <h1 style="text-align: center;">Omnia Restaurants' Location</h1>



<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var myCenter = new google.maps.LatLng(37.812584, 23.776036);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 16};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker(
          {position:myCenter,
           animation: google.maps.Animation.BOUNCE
          });
  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
    content: "Απόλλωνος 14"
  });
  infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKK0R6iOLGtCzPv_47__iZbVMSwtep_0g&callback=myMap"></script>
<?php
include 'footer.php';
?>
</body>


