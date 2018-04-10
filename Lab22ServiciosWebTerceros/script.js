var lastMarker;
var theMap;

function initMap() {
    var uluru = {lat: 50.358, lng: 100.061};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        draggable: true
    });

    marker.addListener('click', function() {
        map.setZoom(8);
        map.setCenter(marker.getPosition());
    });

    lastMarker = marker;
    theMap = map;
}

document.getElementById("addMarkerButton").onclick = function (){
    var marker = new google.maps.Marker({
        position: {lat: lastMarker.getPosition().lat(), lng: lastMarker.getPosition().lng() - 0.5},
        map: theMap,
        draggable: true
    });
    marker.addListener('click', function() {
        map.setZoom(8);
        map.setCenter(marker.getPosition());
    });
    lastMarker = marker;
};

