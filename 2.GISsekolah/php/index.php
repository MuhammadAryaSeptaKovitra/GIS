<?php 
require 'function.php';
$sekolah = query("SELECT * FROM tbl_sekolah");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  </head>
  <body>
    <div id="wrapper">
      <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">GIS SEKOLAH</a>
        </div>
        <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px">
          Tanggal :<?=date("d M Y")?>
          &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">login</a>
        </div>
      </nav>
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">
            <li class="text-center">
              <img src="../assets/img/find_user.png" class="user-image img-responsive" />
            </li>

            <li>
              <a class="active-menu" href="index.html"><i class="fa fa-globe"></i> Pemetaan</a>
            </li>
            <li>
              <a href="sekolah.php"><i class="fa fa-building"></i>Sekolah</a>
            </li>
            <li>
              <a href="inputsekolah.php"><i class="fa fa-plus"></i>Input Sekolah</a>
            </li>
            <li>
              <a href="user.php"><i class="fa fa-users"></i> User</a>
            </li>
            <li>
              <a href="inputuser.php"><i class="fa fa-plus"></i>Input Users</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Pemetaan</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div id="mapid" style="height: 500px"></div>
              <script>
                var mymap = L.map("mapid").setView([3.591482, 98.669426], 13);

                L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
                  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                  id: "mapbox/streets-v11",
                }).addTo(mymap);
                var icon_sekolah = L.icon({
                      iconUrl: '../assets/sekolah.png',
                      iconSize:     [35, 45], // size of the icon
                      
                  });
                <?php foreach($sekolah as $key) :?>
                  L.marker([<?= $key["latitude"];?>, <?= $key["longitude"];?>],{icon:icon_sekolah}).addTo(mymap).bindPopup("<b>Nama Sekolah: <?= $key["nama_sekolah"];?></b><br>"+ 
                              "Alamat Sekolah: <?= $key["alamat"];?><br>"+ 
                              "Status: <?= $key["status_Sekolah"];?><br>"+
                              "Keterangan: <?= $key["keterangan"];?><br>");
                <?php endforeach; ?>
              </script>
            </div>
          </div>
        </div>

        <!-- /. PAGE INNER  -->
      </div>
      <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
  </body>
</html>
