<?php
if ($_SESSION['role'] == "mahasiswa") {
    header('location: ./pages/mahasiswa/');
}
elseif ($_SESSION['role'] == "dosen") {
    header('location: ./pages/dosen/');
}
elseif ($_SESSION['role'] == "admin") {
    header('location: ./pages/admin/');
}
else {
    header('location: ./');
}