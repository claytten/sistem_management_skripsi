<?php
session_start();
include '../../../action/koneksi.php';
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../../');
}

$id_ta = $_POST['id_ta'];
$id_ta_del = $_GET['id_ta'];
$aksi = $_POST['aksi'];
$aksi_del = $_GET['aksi'];
$nama_mhs = $_POST['nama_mhs'];
$nama_dosbing = $_POST['nama_dosbing'];
$nim = $_POST['nim'];
$tema = $_POST['tema'];
$judul = $_POST['judul'];
$get_dosbing = mysqli_real_escape_string("SELECT dosen.nidn FROM dosen WHERE dosen.nama ='$nama_dosbing'");


if ($aksi == 'edit') {
    $query_ta =
        mysqli_query($connect,
            "UPDATE `ta` SET `judul` = '$judul', `tema` = '$tema', `id_mhs` = '$nim', `id_dosbing`='$get_dosbing'  WHERE `id_ta` = '$id_ta';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query_ta) {
        $_SESSION['successMessage'] = "Edit sukses!";
        header('location:./');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:./');
    }

}
elseif ($aksi_del == 'delete') {
    $query =
        mysqli_query($connect,
            "DELETE FROM `ta` WHERE `ta`.`id_ta` = '$id_ta_del';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query) {
        $_SESSION['successMessage'] = "Delete sukses!";
        header('location:./');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:./');
    }
}
