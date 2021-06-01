<?php
require "function.php";
// cek apakah tombol submit sudah ditekan apa belum
if(isset ($_POST["submit"])){

    //cek apakah data berhasil ditambah atau tidak
    if(tambah($_POST)>0){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'sekolah.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'inputsekolah.php';
        </script>
    ";
    }
}
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
              <a  href="index.php"><i class="fa fa-globe"></i> Pemetaan</a>
            </li>
            <li>
              <a href="sekolah.php"><i class="fa fa-building"></i>Sekolah</a>
            </li>
            <li>
              <a class="active-menu" href="inputsekolah.php"><i class="fa fa-plus"></i>Input Sekolah</a>
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
            <h2>Input Sekolah</h2>
            </div>
                <div class="col-md-7 col-sm-7">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        Lokasi Sekolah
                        </div>
                        <div class="panel-body">
                        <div id="mapid" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-7">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input data
                        </div>
                        <div class="panel-body" >
                        <form action="#" method="POST" enctype="multipart/form-data" name="myform">
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input name="nama_sekolah" placeholder="Isikan Nama Sekolah" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Alamat Sekolah</label>
                                <input name="alamat" placeholder="Isikan Alamat Sekolah" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_Sekolah"class="form-control" >
                                    <option value="">--Pilih Status Sekolah--</option>    
                                    <option value="Negeri">Negeri</option>    
                                    <option value="Swasta">Swasta</option>    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kepala Sekolah</label>
                                <input name="kepala_sekolah" placeholder="Isikan Nama Kepala Sekolah" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input id="Latitude" name="latitude" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input id="Longitude" name="longitude" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input name="keterangan" placeholder="Isikan Keterangan  Sekolah" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label></label>
                                <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>  
                                <button class="btn btn-sm btn-success" type="reset">Reset</button>
                        </div>
                            </form>
                        </div>
                    </div>
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
    <script>
        var curLocation=[0,0];
        if (curLocation[0]==0 && curLocation[1]==0) {
            curLocation =[3.591482, 98.669426];	
        }

        var mymap = L.map('mapid').setView([3.591482, 98.669426], 14);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11'
        }).addTo(mymap);

        mymap.attributionControl.setPrefix(false);
        var marker = new L.marker(curLocation, {
            draggable:'true'
        });

        marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable : 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
        });

        $("#Latitude, #Longitude").change(function(){
            var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
            draggable : 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });
        mymap.addLayer(marker);

    </script>
</body>
</html>
