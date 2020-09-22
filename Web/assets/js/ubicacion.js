let marker;

initMap=function() {
  navigator.geolocation.getCurrentPosition(
    function(position) {
      coords = {
        lng: position.coords.longitude,
        lat: position.coords.latitude
      };
      setMap(coords); 
      document.getElementById("ubiGra").value = position.coords.latitude +" "+ position.coords.longitude;     
    },
    function(error) {
      console.log(error);
    });

}
function setMap(coords){
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 20,
    center:  new google.maps.LatLng(coords.lat, coords.lng),
  });
  marker = new google.maps.Marker({
    map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position:new google.maps.LatLng(coords.lat, coords.lng),
  });
  marker.addListener("click", toggleBounce);
  marker.addListener('dragend', function(event) {
  document.getElementById("ubiGra").value =  this.getPosition().lat()+" "+  this.getPosition().lng();  

  });
}


function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
