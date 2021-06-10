<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geojson</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <style>
    #mapid { height: 100vh; }
   </style>
</head>
<body>
    <div id="mapid"></div>
</body>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin="">
</script>
<script src="assets/leaflet.ajax.js"></script>


<script type="text/javascript">
    var mymap = L.map('mapid').setView([ -7.06294775,110.80748224], 5);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    function popUp(f,l){
    var out = [];
    if (f.properties){
        if(f.geometry){
        // for(key in f.properties){
        //      out.push(key+": "+f.properties[key]);
        // }
        out.push("Nama Rumah Sakit: "+f.properties["Remarks"]);
        out.push('<img width="200px;" src="assets/Photos/'+String(f.properties["Photo"]) + '">');
        out.push("Koordinate "+f.geometry["coordinates"]);
        l.bindPopup(out.join("<br />"));
        }
    }
}
    var jsonTest = new L.GeoJSON.AJAX(["assets/SIG.geojson"],{onEachFeature:popUp}).addTo(mymap);  

</script>
</html>