var geocoder = new google.maps.Geocoder();

function initialize() {
    var mapOptions = {
        center: { lat: 56.8827113, lng: 12.6913998},
        zoom: 12,
        disableDefaultUI: false
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    $.ajax({
        type: 'GET',
        url:'http://icode4u.se/fibertillsloinge/intressenter',
        dataType: "json",
        success: function(data){

            var locations = data;
            timeout = 600;
            places = [];
            address_position = 0;

            if(locations != undefined) {

                for (var i = 0; i < locations.length; i++) {

                    var infoContent = "<div><strong>" + locations[i].name + (locations[i].name2.length ? " & " + locations[i].name2 : "") + "</strong><br />";
                    infoContent += locations[i].address;
                    infoContent += "</div>";

                    setMarkers(map, locations[i], infoContent);


                    $("#intressenter-list").append("<li>" + locations[i].address + "</li>");

                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(textStatus);
        }
    });


}
google.maps.event.addDomListener(window, 'load', initialize);


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
