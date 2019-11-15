<?php
include '../../../action/koneksi.php';
session_start();
if (empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}

$id_dosuji = $_POST['id_dosuji'];
$tgl_sidang = $_POST['tgl_sidang'];
$ruang_sidang = $_POST['ruang_sidang'];
$nim = $_SESSION['nim'];

$query_ta =
    mysqli_query($connect,
    "UPDATE ta SET id_dosuji = '$id_dosuji' WHERE id_ta = (SELECT id_ta where id_mhs = '$nim');"
    ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";

$query_jadwal =
    mysqli_query(
        $connect,
        "INSERT INTO jadwal (id_jadwal, jenis_jadwal, ruang, datetime) 
VALUES ((SELECT id_ta from ta where ta.id_mhs = '$nim'), 'sidang', '$ruang_sidang', '$tgl_sidang');"
    ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";

if($query_ta && $query_jadwal){
    $_SESSION['successMessage'] = "Pengajuan Sidang Akhir sukses!";
    header('location:../');
} else {
    $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    header('location:../');
}