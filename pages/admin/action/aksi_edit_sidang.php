<?php
session_start();
include '../../../action/koneksi.php';
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../../');
}

$idx = $_POST['idx'];
$idx_del = $_GET['idx'];
$aksi = $_POST['aksi'];
$aksi_del = $_GET['aksi'];
$nama_mhs = $_POST['nama_mhs'];
$nama_dosbing = $_POST['nama_dosbing'];
$nama_dosuji = $_POST['nama_dosuji'];
$nim = $_POST['nim'];
$datetime = $_POST['datetime'];
$status = $_POST['status'];
$ruang = $_POST['ruang'];
$nilai = $_POST['nilai'];
$id_ta = $_POST['id_ta'];
if ($aksi == 'edit') {
    $query_jadwal =
        mysqli_query($connect,
            "UPDATE `jadwal` SET `datetime` = '$datetime' WHERE `jadwal`.`idx` = '$idx';"
        ) or $_SESSION['errorMessage'] = "Masukkan data dengan benar!";

    $query_ta =
        mysqli_query($connect,
            "UPDATE `ta` SET `nilai` = '$nilai' WHERE `ta`.`id_ta` = '$id_ta';"
        ) or $_SESSION['errorMessage'] = "Masukkan data dengan benar!";
    if ($query_jadwal && $query_ta) {
        $_SESSION['successMessage'] = "Edit sukses!";
        header('location:../sidang_mhs.php');
    }
    else {
        $_SESSION['errorMessage'] = "Masukkan data dengan benar!";
        header('location:../sidang_mhs.php');
    }

}
elseif ($aksi_del == 'delete') {
    $query1 =
        mysqli_query($connect,
            "UPDATE `ta` SET `nilai` = '0' WHERE `ta`.`id_ta` = '$id_ta';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    $query2 =
        mysqli_query($connect,
            "DELETE FROM `jadwal` WHERE `jadwal`.`idx` = '$idx_del';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query && $query2) {
        $_SESSION['successMessage'] = "Delete sukses!";
        header('location:../sidang_mhs.php');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:../sidang_mhs.php');
    }
}