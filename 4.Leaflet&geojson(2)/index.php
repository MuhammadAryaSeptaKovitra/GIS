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
    .icon-bar {
	background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
    }
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
<script src="assets/js/leaflet.ajax.js"></script>
<script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>



<script type="text/javascript">
    var mymap = L.map('mapid').setView([-3.824181,114.8191513], 10);
	var layerkita =L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	});
    mymap.addLayer(layerkita);

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
    var myStyle3 = {
    "color": "#00ff00",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle4 = {
    "color": "#009900",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle5 = {
    "color": "#880088",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle6 = {
    "color": "#ff9900",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle7 = {
    "color": "#ff00ff",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle8 = {
    "color": "#ff0099",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle9 = {
    "color": "#225588",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle10 = {
    "color": "#ffff00",
    "weight": 3,
    "opacity": 0.1
    };
    var myStyle11= {
    "color": "#900900",
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
    //Legend
    function iconByName(name) {
        return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
    }

    function featureToMarker(feature, latlng) {
        
    }

    var baseLayers = [
        {
            name: "OpenStreetMap",
            layer: layerkita
        },
        // {
        //     name: "OpenCycleMap",
        //     layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
        // },
        // {
        //     name: "Outdoors",
        //     layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
        // }
    ];

    var overLayers = [
        {
            name: "Bumi Makmur",
            icon: iconByName('Bumi Makmur'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Bumi_Makmur.geojson"],{onEachFeature:popUp,style:myStyle,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Panyipatan",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Panyipatan.geojson"],{onEachFeature:popUp,style:myStyle2,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Takisung",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/takisung.geojson"],{onEachFeature:popUp,style:myStyle3,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Bajuin",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/bajuin.geojson"],{onEachFeature:popUp,style:myStyle4,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Bati_Bati",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Bati_Bati.geojson"],{onEachFeature:popUp,style:myStyle5,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Batu_Ampar",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Batu_Ampar.geojson"],{onEachFeature:popUp,style:myStyle6,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Pelaihari",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Pelaihari.geojson"],{onEachFeature:popUp,style:myStyle7,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Jorong",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Jorong.geojson"],{onEachFeature:popUp,style:myStyle8,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Kintap",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Kintap.geojson"],{onEachFeature:popUp,style:myStyle9,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Kurau",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Kurau.geojson"],{onEachFeature:popUp,style:myStyle10,pointToLayer: featureToMarker}).addTo(mymap)
        },
        {
            name: "Tambang_Ulang",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Tambang_Ulang.geojson"],{onEachFeature:popUp,style:myStyle11,pointToLayer: featureToMarker}).addTo(mymap)
        }
    ];

    var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

    mymap.addControl(panelLayers);

</script>
</html>