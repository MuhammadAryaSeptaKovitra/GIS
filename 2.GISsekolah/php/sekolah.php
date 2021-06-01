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

    <!-- CUSTOM STYLES-->
<link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
<link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Binary admin</a> 
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
                <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
                </li>
                <li>
            <a  href="index.php"><i class="fa fa-globe"></i> Pemetaan</a>
            </li>
        <li>
            <a  class="active-menu" href="sekolah.php"><i class="fa fa-building"></i>Sekolah</a>
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
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Data Sekolah</h2>   
                    
                </div>
            </div>
                <!-- /. ROW  -->
                <hr />
            
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Advanced Tables
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Status Sekolah</th>
                                    <th>Kepala Sekolah</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($sekolah as $key) :?>
                                    <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?= $key["nama_sekolah"];?></td>
                                    <td><?= $key["alamat"];?></td>
                                    <td><?= $key["status_Sekolah"];?></td>
                                    <td><?= $key["kepala_sekolah"];?></td>
                                    <td><?= $key["keterangan"];?></td>
                                    <td>
                                        <a href="editsekolah.php?id= <?=$key["id_sekolah"];?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="hapussekolah.php?id= <?= $key["id_sekolah"];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Ingin Dihapus?')">Hapus</a>
                                    </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
                <!--  end  Context Classes  -->
            </div>
        </div>
            <!-- /. ROW  -->
    </div>
            
</div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
</script>
        <!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>


</body>
</html>
