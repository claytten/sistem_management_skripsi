<?php
include "../../../action/koneksi.php";
session_start();
if(empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../../');
}

$judul = $_POST['judul'];
$tema = $_POST['tema'];
$id_mhs = $_SESSION['nim'];
$id_dosbing = $_POST['id_dosbing'];

$query =
    mysqli_query($connect,
        "INSERT INTO ta(id_ta, judul, tema, id_mhs, id_dosbing, id_dosuji) 
            VALUES (NULL, '$judul', '$tema', '$id_mhs', '$id_dosbing', NULL);"
    ) or $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";


if($query){
    $_SESSION['successMessage'] = "Pendaftaran TA sukses!";
    header('location:../');
} else {
    $_SESSION['errorMessage'] = "Ada kesalahan saat pengisian data";
    header('location:../');
}