<?php
include '../../action/koneksi.php';
session_start();
if (empty($_SESSION["user_id"])) {
    $_SESSION["errorMessage"] = "Login dulu woi";
    header('Location: ../../');
}

$status_param = $_POST['status_param'];
$nim = $_SESSION['nim'];

if ($status_param == "cek_ta") {
    $ta_array = mysqli_fetch_array(mysqli_query($connect, "select * from ta where id_mhs = '$nim'"));
    if (count($ta_array)>0) {
        $ta = true;
    }
    else $ta = false;

    echo json_encode(array('status' => $ta));
}
elseif ($status_param == "cek_sempro") {
    $sempro_array = mysqli_fetch_array(mysqli_query($connect, "SELECT jenis_jadwal, acc_status FROM jadwal, ta where id_jadwal=id_ta and id_mhs = '$nim' and jenis_jadwal='sempro';"));
    if (count($sempro_array)>0) {
        $sempro = true;
        if ($sempro_array['acc_status'] == 'belum') $acc_status = false;
        else $acc_status = true;
    }
    else $sempro = false;
    echo json_encode(array('status' => $sempro, 'acc' => $acc_status));
}
elseif ($status_param == "cek_sidang") {
    $sidang_array = mysqli_fetch_array(mysqli_query($connect, "SELECT jenis_jadwal, acc_status FROM jadwal, ta where id_jadwal=id_ta and id_mhs = '$nim' and jenis_jadwal='sidang';"));
    if (count($sidang_array)>0) {
        $sidang = true;
        if ($sidang_array['acc_status'] == 'belum') {
            $acc_status = false;
        }else {
            if($status_param == 'cek_sempro') {
                $acc_status = true;
            }
            $acc_status = true;
        }
    }
    else $sidang = false;
    echo json_encode(array('status' => $sidang, 'acc' => $acc_status));
}else {
    echo json_encode(array('status' => 'invalid'));
}
