<?php 
   
  require "php/db_connection.php";

  if($con) {
    $query = "UPDATE admin_credentials SET IS_LOGGED_IN = 'false'";
    $result = mysqli_query($con, $query);
  }     
  session_start();
  $_SESSION["username"] = 0;
  $_SESSION["role"] = 0;
  $_SESSION["loggedin"] = 0;
  session_destroy();
  header('Location: index.php');
   exit();


  ?>

