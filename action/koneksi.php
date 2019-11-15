<?php
$dbhost = "localhost";
$dbuser = "zerocool";
$dbpass = "Gordon_1";
$dbname = "projection";
$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connect->connect_error) {
    die("Maaf, koneksi gagal: ".$connect->connect_error);
}
