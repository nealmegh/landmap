<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Polygon Arrays</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
            width:50%;
            float:left;
        }
        #description{
            height: 100%;
            width:50%;
            float:right;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>


<div id="map"></div>

<input type="hidden" value="{{$lands}}" name="lands" id="lands" >
<div id="description"></div>
<script>
{{--    {{dd($lands[0]->geo_points)}}--}}
    // This example creates a simple polygon representing the Bermuda Triangle.
    // When the user clicks on the polygon an info window opens, showing
    // information about the polygon's coordinates.

    var map;
    var infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 20,
            center: {lat: 23.79561, lng: 90.36995}, //23.79561,90.36995
            mapTypeId: 'terrain'
        });

        var lands = document.getElementById('lands');
        var jobj = JSON.parse(lands.value);
        //console.log(jobj[0]['geo_points']);
        // var latlng = jobj[0]['geo_points'];
        // var vari = latlng.split(';');
        // var jst = JSON.stringify(vari);
        // // var fob = jst.replace(/["]+/g, '');
        // var jobj2 = JSON.parse(latlng);
        // console.log(jobj2);
        // Define the LatLng coordinates for the polygon.
        //[{lat: 23.79561, lng: 90.36995},{lat: 23.79562, lng: 90.37007},{lat: 23.79564, lng: 90.37018},{lat: 23.7955, lng: 90.37022},{lat: 23.79547, lng: 90.37011},{lat: 23.79546, lng: 90.36999},{lat: 23.79552, lng: 90.36998}]
        var location_coordinates1 = [
            {lat: 23.79561, lng: 90.36995},
            {lat: 23.79562, lng: 90.37007},
            {lat: 23.79564, lng: 90.37018},
            {lat: 23.7955, lng: 90.37022},
            {lat: 23.79547, lng: 90.37011},
            {lat: 23.79546, lng: 90.36999},
            {lat: 23.79552, lng: 90.36998}
        ];
        // console.log(location_coordinates1);
        //23.79543,90.36981   23.79554,90.36978   23.79552,90.36965  23.79541,90.36967
        // var location_coordinates2 = [
        //     {lat: 23.79543, lng: 90.36981},
        //     {lat: 23.79554, lng: 90.36978},
        //     {lat: 23.79552, lng: 90.36965},
        //     {lat: 23.79541, lng: 90.36967}
        // ];
        // var loc_coords=[];
        // loc_coords.push(location_coordinates1,location_coordinates2);

        // var custom_address;
        var i;
        for(i=0; i<2; i++){
            // Construct the polygon.
            var latlng = jobj[i]['geo_points'];
            // var vari = latlng.split(';');
            var jobj2 = JSON.parse(latlng);
            var build_location = new google.maps.Polygon({
                paths: jobj2,
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 3,
                fillColor: '#FF0000',
                fillOpacity: 0.35
            });
            build_location.setMap(map);


            build_location.addListener('click', sidepane);



        }

    }

    /** @this {google.maps.Polygon} */
    function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        var vertices = this.getPath();

        var contentString = '<b>Bermuda Triangle polygon</b><br>' +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';

        // Iterate over the vertices.
        for (var i =0; i < vertices.getLength(); i++) {
            var xy = vertices.getAt(i);
            contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
                xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
    }
    function sidepane(event,custom_address) {
        var contentString = custom_address +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';
        document.getElementById("description").innerHTML = contentString;

        console.log(service);
    }
    function sidepane1(event) {
        var contentString = '<b>Bluwebz</b><br>' +
            'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';
        document.getElementById("description").innerHTML = contentString;
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADQJYYZvemPn-In8lYIsI-luEQ4wnetkU&libraries=places&callback=initMap">
</script>
</body>
</html>