<?php
  require "db_connection.php";
  if($con) {
    $name = ucwords($_GET["name"]);
    $age = ucwords($_GET["age"]);
    $date_of_birth = ucwords($_GET["date_of_birth"]);
    $contact_number = $_GET["contact_number"];
    $alternative_number = $_GET["alternative_number"];
    $father_name = $_GET["father_name"];
    $father_occupation = $_GET["father_occupation"];
    $mother_name = $_GET["mother_name"];
    $mother_occupation = $_GET["mother_occupation"];
    $address1 = ucwords($_GET["address1"]);
    $address2 = ucwords($_GET["address2"]);
    $adhar_card_number = ucwords($_GET["adhar_card_number"]);
    $given_card = ucwords($_GET["given_card"]);
    $district = ucwords($_GET["district"]);
    $taluk = ucwords($_GET["taluk"]);
    $villege = ucwords($_GET["villege"]);


    $query = "SELECT * FROM customers WHERE CONTACT_NUMBER = '$contact_number'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Customer ".$row['NAME']." with contact number $contact_number already exists!";
    else {
      $query = "INSERT INTO customers (name, AGE, DATE_OF_BIRTH, CONTACT_NUMBER, ALTERNATIVE_NUMBER, FATHER_NAME, FATHER_OCCUPATION, MOTHER_NAME, MOTHER_OCCUPATION, ADDRESS1, ADDRESS2, ADHAR_CARD_NUMBER, GIVEN_CARD, DISTRICT, TALUK, VILLEGE) VALUES('$name', '$age', '$date_of_birth', '$contact_number', '$alternative_number', '$father_name', '$father_occupation', '$mother_name', '$mother_occupation', '$address1', '$address2', '$adhar_card_number', '$given_card', '$district', '$taluk', '$villege')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added...";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
