<?php
session_start();
include '../../../action/koneksi.php';
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../../');
}

$idx = $_POST['idx'];
$idx_del = $_GET['idx'];
$nim_del = $_GET['nim'];
$aksi = $_POST['aksi'];
$aksi_del = $_GET['aksi'];
$nama_mhs = $_POST['nama_mhs'];
$nama_dosbing = $_POST['nama_dosbing'];
$nama_dosuji = $_POST['nama_dosuji'];
$nim = $_POST['nim'];
$datetime = $_POST['datetime'];
$status = $_POST['status'];
$ruang = $_POST['ruang'];
$id_dosbing = $_POST['id_dosbing'];


if ($aksi == 'edit') {
    $query_jadwal =
        mysqli_query($connect,
            "UPDATE `jadwal` SET `datetime` = '$datetime' WHERE `jadwal`.`idx` = '$idx';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    $query_ta =
        mysqli_query($connect,
            "UPDATE `ta` SET `id_dosuji` = '$id_dosbing' WHERE `ta`.`id_dosbing` = '$id_dosbing';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query_jadwal && $query_ta) {
        $_SESSION['successMessage'] = "Edit sukses!";
        header('location:../sempro_mhs.php');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:../sempro_mhs.php');
    }

}
elseif ($aksi_del == 'delete') {
    $query =
        mysqli_query($connect,
            "DELETE FROM `ta` WHERE `ta`.`id_mhs` = '$nim_del';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query) {
        $_SESSION['successMessage'] = "Delete sukses!";
        header('location:../sempro_mhs.php');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:../sempro_mhs.php');
    }
}