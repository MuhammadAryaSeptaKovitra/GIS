<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GIS dasar</title>
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
    <!-- Link  -->
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  </head>
  <body>
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
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px">Tanggal :<?=date("d M Y")?> &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">login</a></div>
          </nav>
          <!-- /. NAV TOP  -->
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">
                <li class="text-center">
                  <img src="../assets/img/find_user.png" class="user-image img-responsive" />
                </li>
                <li>
                  <a href="index.html"><i class="fa fa-globe"></i> View Map</a>
                </li>
                <li>
                  <a href="marker.html"><i class="fa fa-map-marker"></i> Marker</a>
                </li>
                <li>
                  <a href="polyline.html"><i class="fa fa-line-chart"></i> Polyline</a>
                </li>
                <li>
                  <a href="rute.html"><i class="fa fa-road"></i> Rute</a>
                </li>
                <li>
                  <a href="polygone.html"><i class="fa fa-square"></i> Polygone</a>
                </li>
                <li>
                  <a href="circle.html"><i class="fa fa-dot-circle-o"></i> Circle</a>
                </li>
                <li>
                  <a href="getCoordinate.html"><i class="fa fa-location-arrow"></i> Coordinate</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-map-marker fa-3x"></i> TPS Kota Bandung<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="tps.php">Pemetaan Lokasi TPS(marker)</a>
                    </li>
                    <li>
                      <a href="tps2.php">Pemetaan Lokasi TPS(Circle)</a>
                    </li>
                    <li>
                      <a href="cluster.php">Cluster</a>
                    </li>
                    <li>
                      <a href="heatmap.php">Heat Map</a>
                    </li>
                    <li>
                      <a href="search.php">Search Leaflet</a>
                    </li>
                  </ul>
                </li>
                <li>
                      <a href="basemap.php">Base Map</a>
                </li>
              </ul>
            </div>
          </nav>
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
