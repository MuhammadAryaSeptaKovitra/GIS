<?php
$kecamatan = [
			"Bajuin"=>["#ff0000",10000],
			 "Bati_Bati"=>["#00ff00",12000], 
			 "Batu_Ampar"=>["#009900",9000], 
			 "Bumi_Makmur"=>["#880088",8000],
			 "Jorong"=>["#ff9900",6700],
			 "Kintap"=>["#ff00ff",9000],
			 "Kurau"=>["#ff0099",8400],
			 "Panyipatan"=>["#225588",5400],
			 "Pelaihari"=>["#900900",5300],
			 "Takisung"=>["#888888",7800],
			 "Tambang_Ulang"=>["#345500",65000]
			];

?>
<!DOCTYPE html>
<html>
<head>
	<title>WebGIS GeoJson</title>
	 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <link rel="stylesheet" href="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
   <style type="text/css">
   	#mapid { height: 100vh; }
   	.icon {
	display: inline-block;
	margin: 2px;
	height: 16px;
	width: 16px;
	background-color: #ccc;
	}
	.icon-bar {
		background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
	}
	.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
	.legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }
   </style>
</head>
<body>
 	<div id="mapid"></div>
</body>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

 <script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
 <script src="assets/js/leaflet.ajax.js"></script>

   <script type="text/javascript">
   	<?php
   	foreach ($kecamatan as $key => $value) {
   		$data[strtoupper(str_replace('_', ' ', $key))]=$value[1];
   	}
   	echo 'var POPULASI='.json_encode($data);
   	?>

   	var map = L.map('mapid').setView([-3.824181, 114.8191513], 10);

   	var LayerKita=L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
});
	map.addLayer(LayerKita);

// control that shows state info on hover
	var info = L.control();

	info.onAdd = function (map) {
		this._div = L.DomUtil.create('div', 'info');
		this.update();
		return this._div;
	};

	info.update = function (props) {
		this._div.innerHTML = '<h4>Populasi di Kabupaten Tanah Laut</h4>' +  (props ?
			'<b>' + props.KECAMATAN + '</b><br />' + POPULASI[props.KECAMATAN] + ' org / m<sup>2</sup>'
			: 'Dekatkan mouse untuk melihat');
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
			fillColor: getColor(POPULASI[feature.properties.KECAMATAN])
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
		var layer = e.target;

		layer.setStyle({
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3'
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



	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

	var baseLayers = [
		{
			name: "OpenStreetMap",
			layer: LayerKita
		},
		{	
			name: "OpenCycleMap",
			layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
		}
	];

	<?php
		foreach ($kecamatan as $key => $value) {
			?>

			<?php
			$arrayKec[]='{
			name: "'.str_replace('_', ' ', $key).'",
			icon: iconByName("'.$value[0].'"),
			layer: new L.GeoJSON.AJAX(["assets/geojson/'.$key.'.geojson"],{
				style: style,
				onEachFeature: onEachFeature
			}).addTo(map)
			}';
		}
	?>

	var overLayers = [{
		group: "Layer Kecamatan",
		layers: [
			<?=implode(',', $arrayKec);?>
		]
	}
	];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true,
		position:'bottomleft'
	});

	map.addControl(panelLayers);



   </script>
</html>