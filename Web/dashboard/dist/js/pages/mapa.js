let marker;

initMap=function() {
    var ubiGra= document.getElementById("ubiGra").value;
    coords = ubiGra.split(" ",2);
      setMap(coords); 
     
    
}
function setMap(coords){
    
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 20,
    center:  new google.maps.LatLng(coords[0], coords[1]), /* coords[0]= latitud  coords[1]= longitud*/
  });
  marker = new google.maps.Marker({
    map,
    draggable: false,
    animation: google.maps.Animation.DROP,
    position:new google.maps.LatLng(coords[0], coords[1]),
  });
  marker.addListener("click", toggleBounce);
  marker.addListener('dragend', function(event) {
  
  });
}


function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
