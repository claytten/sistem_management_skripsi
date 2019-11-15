<?php
session_start();
if(!empty($_SESSION["user_id"])) {
    require_once 'dashboard.php';
} else {
    require_once 'action/login.php';
}