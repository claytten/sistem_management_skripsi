<?php
session_start();
include '../../action/koneksi.php';
if(empty($_SESSION["user_id"]) || $_SESSION['role'] != "dosen") {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}

$idx = $_GET['idx'];
$aksi = $_GET['aksi'];

if ($aksi == 'approve') {
    $query =
        mysqli_query($connect,
            "UPDATE `jadwal` SET `acc_status` = 'sudah' WHERE `jadwal`.`idx` = '$idx';"
        ) or die(mysqli_error($connect));

}
elseif ($aksi == 'decline') {
    $query =
        mysqli_query($connect,
            "UPDATE `jadwal` SET `acc_status` = 'tidak' WHERE `jadwal`.`idx` = '$idx';"
        ) or die(mysqli_error($connect));
}


if($query){
    $_SESSION['successMessage'] = "Pendaftaran Seminar Proposal sukses!";
    header('location:../../');
} else {
    $_SESSION['errorMessage'] = mysqli_error($connect);
    header('location:../../');
}
