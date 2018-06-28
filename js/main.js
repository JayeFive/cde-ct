// Embedded Google map
$(function () {

    function initMap() {

        var location = new google.maps.LatLng(41.3057098, -73.2508827);

        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: location,
            zoom: 16,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position: location, map: map});

    }

    google.maps.event.addDomListener(window, 'load', initMap);
});