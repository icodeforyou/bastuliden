$( document ).ready(function() {

    $(".users-table tbody tr").hover(function() {
        $(this).toggleClass("active");
    });

});
$(function()
{
    $('#contentEditable').redactor();
});

var geocoder = new google.maps.Geocoder();

function initialize() {
    
    if(typeof loc === 'undefined'){
      return false;
    }

    var centerLat = parseFloat(loc.estates[0].lat,10);
    var centerLon = parseFloat(loc.estates[0].lon,10);


    var mapOptions = {
        center: { lat: centerLat, lng: centerLon },
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
        disableDefaultUI: true
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    for (var i = 0; i < loc.estates.length; i++) {
        var infoContent = "<div><strong>" + loc.name + (loc.name2.length ? " & " + loc.name2 : "") + "</strong><br />";
        infoContent += loc.estates[i].address + "<br />";
        infoContent += loc.estates[i].property_nbr;
        infoContent += "</div>";

        setMarkers(map, loc.estates[i], infoContent);
    }

}

function setMarkers (map, location, infoContent) {

  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(location.lat, location.lon),
    map: map,
    title: location.address,
    animation: google.maps.Animation.DROP
  });

  var infowindow = new google.maps.InfoWindow({
    maxWidth: 350
  });

  google.maps.event.addListener(marker, 'click', (function(marker) {
    return function() {
      infowindow.setContent(infoContent);
      infowindow.open(map, marker);
    }
  })(marker));

}

google.maps.event.addDomListener(window, 'load', initialize);



