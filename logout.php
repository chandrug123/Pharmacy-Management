<?php 
   
  require "php/db_connection.php";

  if($con) {
    $query = "UPDATE admin_credentials SET IS_LOGGED_IN = 'false'";
    $result = mysqli_query($con, $query);
  }     
  session_start();
  $_SESSION["username"] = '';
  $_SESSION["role"] = '';
  header('Location: index.php');
   exit();


  ?>

