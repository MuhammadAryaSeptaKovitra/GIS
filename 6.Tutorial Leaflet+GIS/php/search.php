<?php 
    require "functions.php";
    $data = query("SELECT * FROM tbl_tps ");

?>
<?php include("layout.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Plugin search -->
<link rel="stylesheet" href="../leaflet-search-master/src/leaflet-search.css" />
<script src="../leaflet-search-master/src/leaflet-search.js"></script>


</head>
<body>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
            <div class="col-md-12">
                <h2>Search</h2>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 col-sm-12">
                <div id="map" style="height: 500px"></div>
            </div>
            </div>
        </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<script>
//sample data values for populate map
	var data = [
        <?php foreach($data as $key) :?>
		    {"lokasi":[<?= $key["latitude"];?>,<?= $key["longitude"];?>], "nama_tps":"<?=$key["nama_tps"];?>"},
        <?php endforeach; ?>    
	];
    var map = new L.Map('map', {zoom: 13, center: new L.latLng(-6.928578766028023, 107.6178835058195) });	//set center from first location
    map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer

    //Control Search
        var markersLayer = new L.LayerGroup();	//layer contain searched elements
        map.addLayer(markersLayer);
        var controlSearch = new L.Control.Search({
            position:'topleft',		
            layer: markersLayer,
            initial: false,
            zoom: 17,
            marker: false,
            initial: false,
            collapsed: false,
        });
        map.addControl(
        new L.Control.Search({
          layer: markersLayer,
          initial: false,
          collapsed: true,
          zoom: 17,

        })
      );
	////////////populate map with markers from sample data
	for(i in data) {
		var nama_tps = data[i].nama_tps;	//value searched
		var	lokasi = data[i].lokasi;		//position found
		var	marker = new L.Marker(new L.latLng(lokasi), {title: nama_tps} );//se property searched
		marker.bindPopup('Nama TPS: '+ nama_tps );
		markersLayer.addLayer(marker);
	}
</script>

</body>
</html>
