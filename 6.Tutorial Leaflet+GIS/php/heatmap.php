<?php 
    require "functions.php";
    $data = query("SELECT * FROM tbl_tps ");

?>
<?php include("layout.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Plugin Heatmap -->
<script src="../heatMap/dist/leaflet-heat.js"></script>
<script src="http://leaflet.github.io/Leaflet.markercluster/example/realworld.10000.js"></script>
</head>
<body>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
            <div class="col-md-12">
                <h2>heatmap</h2>
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
    var tiles = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(mymap);

    // headmap
    var heat = L.heatLayer([
        <?php foreach($data as $key)  :?>
            [<?=$key["latitude"];?>,<?= $key["longitude"];?>, 100] // lat, lng, intensity
        <?php endforeach; ?>
    ],{radius: 50}).addTo(mymap);

</script>
</body>
</html>
