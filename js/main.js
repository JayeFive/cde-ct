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
        
        marker.addListener('click', function() {
            window.location.replace("https://www.google.com/maps/place/500+Purdy+Hill+Rd,+Monroe,+CT+06468/@41.3057058,-73.2533479,17z/data=!3m1!4b1!4m5!3m4!1s0x89e8083d181224d1:0x48ce777983cc98cd!8m2!3d41.3057058!4d-73.2511592");
        });

    }

    google.maps.event.addDomListener(window, 'load', initMap);
});