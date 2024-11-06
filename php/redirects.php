<?php 
require "db_connection.php";
session_start();
$username =  $_SESSION["username"];
$role =  $_SESSION["role"];
    header("Location: /pharmacy/home.php");
    exit;
?>