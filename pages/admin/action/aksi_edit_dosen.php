<?php
session_start();
include '../../../action/koneksi.php';
if(empty($_SESSION["user_id"]) || $_SESSION['role'] != "admin") {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}

$nidn = $_POST['nidn'];
$nidn_del = $_GET['nidn'];
$aksi = $_POST['aksi'];
$aksi_del = $_GET['aksi'];
$nama = $_POST['nama'];
$tema = $_POST['tema'];
$nidn = $_POST['nidn'];

if ($aksi == 'edit') {
    $query_dosen =
        mysqli_query($connect,
            "UPDATE `dosen` SET `nama` = '$nama', `nama_tema` = '$tema' WHERE `dosen`.`nidn` = '$nidn';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    $query_user =
        mysqli_query($connect,
        "UPDATE `user` SET `username` = '$username', `password` = '$password' WHERE `user`.`nidn` = '$nidn';"
    ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query_dosen && $query_user) {
        $_SESSION['successMessage'] = "Pendaftaran Seminar Proposal sukses!";
        header('location:../dosen.php');
    }
    else {
        $_SESSION['errorMessage'] = mysqli_error($connect);
        header('location:../dosen.php');
    }

}
elseif ($aksi_del == 'delete') {
    $query =
        mysqli_query($connect,
            "DELETE FROM `dosen` WHERE `dosen`.`nidn` = '$nidn_del';"
        ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    if ($query) {
        $_SESSION['successMessage'] = "Pendaftaran Seminar Proposal sukses!";
        header('location:../dosen.php');
    }
    else {
        $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
        header('location:../dosen.php');
    }
}
