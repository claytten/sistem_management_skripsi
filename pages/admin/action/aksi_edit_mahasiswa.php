<?php
session_start();
include '../../../action/koneksi.php';
if(empty($_SESSION["user_id"]) || $_SESSION['role'] != "admin") {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../../');
}

$nim = $_POST['nim'];
$nim_del = $_GET['nim'];
$aksi = $_POST['aksi'];
$aksi_del = $_GET['aksi'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($aksi == 'edit') {
    $query_dosen =
        mysqli_query($connect,
            "UPDATE `mahasiswa` SET `nama` = '$nama' WHERE `mahasiswa`.`nim` = '$nim';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    $query_user =
        mysqli_query($connect,
            "UPDATE `user` SET `username` = '$username', `password` = '$password' WHERE `user`.`nim` = '$nim';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query_dosen && $query_user) {
        $_SESSION['successMessage'] = "Edit sukses!";
        header('location:../mahasiswa.php');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:../mahasiswa.php');
    }

}
elseif ($aksi_del == 'delete') {
    $query =
        mysqli_query($connect,
            "DELETE FROM `mahasiswa` WHERE `mahasiswa`.`nim` = '$nim_del';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query) {
        $_SESSION['successMessage'] = "Delete sukses!";
        header('location:../mahasiswa.php');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:../mahasiswa.php');
    }
}
