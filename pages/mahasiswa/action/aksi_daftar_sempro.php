<?php
include "../../../action/koneksi.php";
include "./aksi_upload.php";
session_start();
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}

$tgl_sempro = $_POST['tgl_sempro'];
$ruang_sempro = $_POST['ruang_sempro'];
$nim = $_SESSION['nim'];

$query =
    mysqli_query($connect,
        "INSERT INTO jadwal (id_jadwal, jenis_jadwal, ruang,datetime) 
VALUES ((SELECT id_ta from ta where ta.id_mhs = '$nim'), 'sempro', '$ruang_sempro', '$tgl_sempro');"
    ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";




if($query){
    $_SESSION['successMessage'] = "Pendaftaran Seminar Proposal sukses!";
    header('location:../');
} else {
    $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    header('location:../');
}