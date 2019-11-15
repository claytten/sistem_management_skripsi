<?php
include "koneksi.php";
session_start();
$_SESSION['user_id'] = "";
if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])
        && !empty($_POST['username']) && !empty($_POST['password'])) {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $query = "SELECT * FROM user WHERE user.username=\"" . $username . "\" AND user.password=\"" . $password . "\"";
        $result = "";
        if (mysqli_error($connect)) {
            echo(mysqli_error($connect));
            die("Connection Error!");
        }
        $result = mysqli_query($connect, $query);
        $rows = mysqli_fetch_array($result);
        $rowlen = count($rows);
        if ($rowlen>0) {
            $_SESSION['user_id'] = $rows['id_user'];
            if (!empty($rows['nim'])){
                $_SESSION['name'] = mysqli_fetch_array(
                    mysqli_query($connect,
                    "select nama from mahasiswa where nim = \"".$rows['nim']."\""
                    )
                )[0];
                $_SESSION['nim'] = $rows['nim'];
                $_SESSION['role'] = "mahasiswa";
            }
            elseif (!empty($rows['nidn'])) {
                $_SESSION['name'] = mysqli_fetch_array(
                    mysqli_query($connect,
                        "select nama from dosen where nidn = \"".$rows['nidn']."\""
                    )
                )[0];
                $_SESSION['nidn'] = $rows['nidn'];
                $_SESSION['role'] = "dosen";
            }
            else {
                if($username == "admin") {
                    $_SESSION['name'] = "Administrator";
                    $_SESSION['role'] = "admin";
                }
            }
        }
        else $_SESSION['errorMessage'] = "Not Match";
    }
    else $_SESSION['errorMessage'] = "Not Match";
}
else $_SESSION['errorMessage'] = "Not Match";
header('Location: ../index.php');