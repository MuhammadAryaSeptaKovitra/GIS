<?php 
    require "functions.php";
    $data = query("SELECT * FROM tbl_tps ");

?>
<?php include("layout.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <!-- Cluster -->
    <link rel="stylesheet" href="../cluster/dist/MarkerCluster.css" />
	<link rel="stylesheet" href="../cluster/dist/MarkerCluster.Default.css" />
	<script src="../cluster/dist/leaflet.markercluster-src.js"></script>
</head>
<body>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
        <div class="col-md-12">
            <h2>Cluster</h2>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12 col-sm-12">
            <div id="mapid" style="height: 500px"></div>
        </div>
        </div>
    </div>

    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
   
    <script>

    var mymap = L.map("mapid").setView([-6.928578766028023, 107.6178835058195], 13);
    L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: "mapbox/streets-v11",
    }).addTo(mymap);
    // Cluster
    var markers = L.markerClusterGroup();
    <?php  foreach($data as $key) :?>
        var lokasi =L.marker([<?= $key["latitude"];?>,<?= $key["longitude"];?>]).bindPopup("<h5><b>Nama TPS: </b><?= $key["nama_tps"];?> </h5><br>Kecamatan: <?= $key["kecamatan"];?> <br> Lokasi: <?= $key["lokasi"];?> <br>Wilayah <?= $key["wilayah"];?>");
        markers.addLayer(lokasi);
		mymap.addLayer(markers);
		mymap.fitBounds(markers.getBounds());
    <?php endforeach; ?>
    </script>
</body>
</html>
