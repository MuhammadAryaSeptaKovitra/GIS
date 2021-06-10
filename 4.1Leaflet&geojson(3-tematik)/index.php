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
    .info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
    .legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }</style>
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
    var map = L.map('mapid').setView([-3.824181,114.8191513], 10);
	var layerkita =L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	});
    map.addLayer(layerkita);
    // control that shows state info on hover
	var info = L.control();
    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function (props) {
        this._div.innerHTML = '<h4>Populasi Di kabupaten tanah laut</h4>' +  (props ?
            '<b>' + props.KECAMATAN + '</b><br />' + props.POPULASI + ' people / m<sup>2</sup>'
            : 'Dekatkan Mouse anda');
    };
    info.addTo(map);

    // get color depending on population density value
	function getColor(d) {
		return d > 12000 ? '#800026' :
				d > 10000  ? '#BD0026' :
				d > 8000  ? '#E31A1C' :
				d > 6000  ? '#FC4E2A' :
				d > 4000   ? '#FD8D3C' :
				d > 2000   ? '#FEB24C' :
				d > 500   ? '#FED976' :
							'#FFEDA0';
	}
    function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.POPULASI)
		};
	}
    function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',
			fillOpacity: 0.7
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

		info.update(layer.feature.properties);
	}
	function resetHighlight(e) {
		var layer =e.target;
        layer.setStyle({
            weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
        });
        info.update();
	}

	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds());
	}

	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
	}
    var legend = L.control({position: 'bottomright'});

	legend.onAdd = function (map) {

		var div = L.DomUtil.create('div', 'info legend'),
			grades = [0, 500, 2000, 4000, 6000, 8000, 10000, 12000],
			labels = [],
			from, to;

		for (var i = 0; i < grades.length; i++) {
			from = grades[i];
			to = grades[i + 1];

			labels.push(
				'<i style="background:' + getColor(from + 1) + '"></i> ' +
				from + (to ? '&ndash;' + to : '+'));
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};

	legend.addTo(map);
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
            layer:new L.GeoJSON.AJAX(["assets/geojson/Bumi_Makmur.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Panyipatan",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Panyipatan.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Takisung",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/takisung.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Bajuin",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/bajuin.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Bati_Bati",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Bati_Bati.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Batu_Ampar",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Batu_Ampar.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Pelaihari",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Pelaihari.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Jorong",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Jorong.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Kintap",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Kintap.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Kurau",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Kurau.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        },
        {
            name: "Tambang_Ulang",
            icon: iconByName('drinking_water'),
            layer:new L.GeoJSON.AJAX(["assets/geojson/Tambang_Ulang.geojson"],{style: style,
		onEachFeature: onEachFeature}).addTo(map)
        }
    ];

    var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
    collapsibleGroups :true,
    position:'bottomleft',
});

    map.addControl(panelLayers);

</script>
</html>