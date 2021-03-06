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
   <link rel="stylesheet" href="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css">
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
<script src="leaflet.ajax.js"></script>
<script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>


<script type="text/javascript">
    var mymap = L.map('mapid').setView([-3.824181,114.8191513], 10);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

    var myStyle = {
    "color": "#ff0000",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle2 = {
    "color": "#ffff00",
    "weight": 3,
    "opacity": 0.1
    };
    function popUp(f,l){
    var out = [];
    if (f.properties){
        // for(key in f.properties){
        //     out.push(key+": "+f.properties[key]);
        // }
        out.push("Provinsi: "+f.properties["PROVINSI"]);
        out.push("Provinsi: "+f.properties["KECAMATAN"]);
        out.push("Ini contoh Pop-up");
        l.bindPopup(out.join("<br />"));
    }
}
    var jsonTest = new L.GeoJSON.AJAX(["assets/Bumi_Makmur.geojson"],{onEachFeature:popUp,style:myStyle}).addTo(mymap);  
    var jsonTest = new L.GeoJSON.AJAX(["assets/Panyipatan.geojson"],{onEachFeature:popUp,style:myStyle2}).addTo(mymap);  

</script>
</html>