<?php 
$nasional_lokasi = json_decode(file_get_contents('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=*&outSR=4326&f=json'),true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Theme</title>

<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../css/metisMenu.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../css/startmin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Web GIS Covid-19</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Top Navigation: Left Menu -->
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li>
        <a href="prov.php"><i class="fa fa-home fa-fw"></i> Home</a>
        </li>
        <li>
        <a href="dunia.php"><i class="fa fa-home fa-fw"></i> Global</a>
        </li>
        <li>
        <a href="pemetaanprov.php"><i class="fa fa-home fa-fw"></i> Pemetaan Provinsi</a>
        </li>
        <li>
        <a href="pemetaandunia.php"><i class="fa fa-home fa-fw"></i> Pemetaan Global</a>
        </li>
    </ul>

    <!-- Top Navigation: Right Menu -->
    <ul class="nav navbar-right navbar-top-links">
        <!-- <li class="dropdown navbar-inverse">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bell fa-fw"></i> <b class="caret"></b> </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
            <a href="#">
                <div>
                <i class="fa fa-comment fa-fw"></i> New Comment
                <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
            </li>
            <li class="divider"></li>
            <li>
            <a class="text-center" href="#">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
            </a>
            </li>
        </ul>
        </li> -->
        <!-- <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b> </a>
        <ul class="dropdown-menu dropdown-user">
            <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li>
            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
            <a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        </li> -->
    </ul>

    <!-- Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                </button>
                </span>
            </div>
            </li>
            <li>
            <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                <a href="#">Second Level Item</a>
                </li>
                <li>
                <a href="#">Third Level <span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                    <a href="#">Third Level Item</a>
                    </li>
                </ul>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav> 

    <!-- Page Content -->
    <div id="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pemetaan Covid-19 Di Indonesia</h1>
        </div>
    </div>
        <!-- ... Your content goes here ... -->
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div id="mapid" style="width: 1000px; height: 800px;"></div>


                <script>
                    var mymap = L.map('mapid').setView([-1.521843,120.603580], 5);
                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/streets-v11',
                    }).addTo(mymap);
                    
                    <?php foreach($nasional_lokasi["features"] as $key) :?>
                        L.marker([<?= $key["geometry"]["y"];?>, <?= $key["geometry"]["x"];?>]).addTo(mymap)
                        .bindPopup("Negara: <?= $key["attributes"]["Provinsi"];?><br>"+
                                    "Positif : <?= $key["attributes"]["Kasus_Posi"];?><br>" +
                                    "Sembuh : <?= $key["attributes"]["Kasus_Semb"];?><br>" +
                                    "Meninggal : <?= $key["attributes"]["Kasus_Meni"];?><br>" 
                        ).openPopup();

                    <?php endforeach; ?>

                </script>
            </div>
        </div>
</div>
    </div>
</div>


<!-- jQuery -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>
</body>
</html>
