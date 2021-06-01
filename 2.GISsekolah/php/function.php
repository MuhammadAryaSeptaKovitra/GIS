<?php 
//Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "sig");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nama_sekolah = isset($data["nama_sekolah"]) ? $data["nama_sekolah"] : "";  
    $alamat = isset($data["alamat"]) ? $data["alamat"] : "";  
    $kepala_sekolah = isset($data["kepala_sekolah"]) ? $data["kepala_sekolah"] : "";     
    $latitude = isset($data["latitude"]) ? $data["latitude"] : "";  
    $longitude = isset($data["longitude"]) ? $data["longitude"] : "";  
    $keterangan = isset($data["keterangan"]) ? $data["keterangan"] : "";  
    $status_Sekolah = isset($data["status_Sekolah"]) ? $data["status_Sekolah"] : "";  

    // Upload Gambar
    // $gambar = upload();
    // if(!$gambar){
    //     return false;
    // }



    // Cek nama sekolah sudah ada atau belum
    $result =mysqli_query($conn,"SELECT nama_sekolah FROM tbl_sekolah WHERE nama_sekolah = '$nama_sekolah '");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert ('Nama Sekolah sudah terdaftar');
        document.location.href = 'inputsekolah.php';
    </script>";
    return false;
    }

// query insert data
$query = "INSERT INTO `tbl_sekolah` (`nama_sekolah`, `alamat`, `kepala_sekolah`, `latitude`, `longitude`, `keterangan`, `status_Sekolah`) VALUES ('$nama_sekolah', '$alamat', '$kepala_sekolah', '$latitude', '$longitude', '$keterangan', '$status_Sekolah')";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);

}

// function upload(){
//     $namaFile = $_FILES['gambar']['name'];
//     $ukuranFIle =$_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tmpName = $_FILES['gambar']['tmp_name'];

//     // Cek apakah ada gambar yg diupload
//     if($error == 4){
//         echo " <script>
//             alert('Pilih gambar terlebih dahulu');
//         </script>";
//         return false;
//     }
//     // Cek apakah itu gambar atau bukan
//     $ekstensiGambarValid = ['jpg','jpeg','png'];
//     // explode u/ pecah cth arya.jpg jadi arya dan jpg
//     $ekstensiGambar = explode('.',$namaFile);
//     // End berfungsi agar jpg diambil dri akhir dan strlower untuk JPG jdi jpg
//     $ekstensiGambar = strtolower (end($ekstensiGambar));
//     if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
//         echo " <script>
//             alert('anda bukan upload gambar');
//         </script>";
//         return false;
//     }
//     // cek apakah ukuran terlalu besar
//     // 1000000 ->1 mb
//     if($ukuranFIle > 1000000 ){
//         echo " <script>
//         alert('Ukuran terlalu besar');
//     </script>";
//     return false;
//     }

//     // Jika lolos pengecekan ,maka gambar siapp di upload
//     // Generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .='.';
//     $namaFileBaru .=$ekstensiGambar;
//     move_uploaded_file($tmpName,"../img/anggota/" .$namaFileBaru);
//     return $namaFileBaru;
// }

// function hapus
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM tbl_sekolah WHERE id_sekolah =$id");
    return mysqli_affected_rows($conn);
}
// Function ubah
function ubah($data){
    global $conn;
    // htmlspecialchars -->untuk menghindari hacker
    $id_sekolah =$data["id_sekolah"];
    $nama_sekolah = isset($data["nama_sekolah"]) ? $data["nama_sekolah"] : "";  
    $alamat = isset($data["alamat"]) ? $data["alamat"] : "";  
    $kepala_sekolah = isset($data["kepala_sekolah"]) ? $data["kepala_sekolah"] : "";     
    $latitude = isset($data["latitude"]) ? $data["latitude"] : "";  
    $longitude = isset($data["longitude"]) ? $data["longitude"] : "";  
    $keterangan = isset($data["keterangan"]) ? $data["keterangan"] : "";  
    $status_Sekolah = isset($data["status_Sekolah"]) ? $data["status_Sekolah"] : "";  
    
    // Cek apakah user pilih gambar baru apa tidak
    // $gambarLama=htmlspecialchars($data["gambarLama"]);
    // if($_FILES['gambar']['error'] === 4){
    //     $gambar =$gambarLama;
    // }else{
    //     $gambar = upload();
    // }
    // query ubah data
    $query = "UPDATE  tbl_sekolah SET
            nama_sekolah  = '$nama_sekolah',
            alamat  = '$alamat',
            kepala_sekolah  = '$kepala_sekolah',
            latitude  = '$latitude',
            longitude  = '$longitude',
            keterangan  = '$keterangan',
            status_Sekolah  = '$status_Sekolah'
        WHERE id_sekolah = $id_sekolah ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
// // function cari
// function cari($keyword){
//     $query = "SELECT * FROM anggota
//                 WHERE
//                     nama LIKE '%$keyword%' OR 
//                     email LIKE '%$keyword%'              
//                     ";
//     return query($query);
// }

?>