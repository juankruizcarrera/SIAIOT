"use strict";
  var coordenadas =''; 
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing">
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: -34.397,
      lng: 150.644
    },
    zoom: 8
  });
  const drawingManager = new google.maps.drawing.DrawingManager({
   
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [
        
        google.maps.drawing.OverlayType.POLYGON
       
      ]
    },
 
  });
  drawingManager.setMap(map);
  google.maps.event.addListener(drawingManager, 'overlaycomplete', function (event) {
    
             if (event.type == google.maps.drawing.OverlayType.POLYGON) {
           $.each(event.overlay.getPath().getArray(), function (key, latlng) {
               var lat = latlng.lat();
               var lon = latlng.lng();
              
              coordenadas += lat + ',' + lon + ':';
           });
       }
      // document.getElementById("ubiGra").value = coordenadas;
    
});
}