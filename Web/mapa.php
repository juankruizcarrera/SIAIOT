<!DOCTYPE html>
<html>
  <head>
    <title>Complex Polylines</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2eJylOzv5YDNnL-zryPIogSIksXd_kI&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
     
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      "use strict";

      // This example creates an interactive map which constructs a polyline based on
      // user clicks. Note that the polyline only appears once its path property
      // contains two LatLng coordinates.
      let poly;
      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 7,
          center: {
            lat: 41.879,
            lng: -87.624
          } // Center the map on Chicago, USA.
        });
       
     
      }
    </script>
  </head>
  <body>
 <div style="height: 50%;">
 <div id="map"></div>
 </div>
 

  
  </body>
</html>
