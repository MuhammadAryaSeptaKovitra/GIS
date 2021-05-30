<?php 
$indo = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/'),true);
$prov = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi/'),true);


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
        <a href="tst.php"><i class="fa fa-home fa-fw"></i> Home</a>
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
            <h1 class="page-header">Perkembangan Covid-19 Di Dunia</h1>
        </div>
        </div>

        <!-- ... Your content goes here ... -->
        <!-- /.row -->
        <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-plus-o fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?=$indo['0']['positif'];?></div>
                    <div>Total Positif!</div>
                </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-smile-o fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?=$indo['0']['sembuh'];?></div>
                    <div>Total Sembuh</div>
                </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-bed fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?=$indo['0']['meninggal'];?></div>
                    <div>Total meninggal</div>
                </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-hospital-o fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?=$indo['0']['dirawat'];?></div>
                <div>Total Dirawat</div>
            </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
            <span class="pull-left">View Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
            </div>
        </a>
        </div>
        </div>
        <div class="col-lg-12 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                Data Kasus Coronavirus GLobal Berdasarkan Negara
                </div>
                <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Provinsi</th>
                                <th class="text-center">Positif</th>
                                <th class="text-center">Sembuh</th>
                                <th class="text-center">Meninggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($prov as $key) :?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td> <span ><?= $key["attributes"]["Provinsi"];?></span></td>
                                <td> <span class="badge badge-red "><?= $key["attributes"]["Kasus_Posi"];?></span></td>
                                <td> <span class="badge badge-success"><?= $key["attributes"]["Kasus_Semb"];?></span></td>
                                <td> <span class="badge badge-danger"><?= $key["attributes"]["Kasus_Meni"];?></span></td>
                        
                        
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
