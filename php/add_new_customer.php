<?php
require "db_connection.php";
if($con) {
    $name = ucwords($_POST["name"]);
    $age = $_POST["age"];
    $date_of_birth = $_POST["date_of_birth"];
    $contact_number = $_POST["contact_number"];
    $alternative_number = $_POST["alternative_number"];
    $father_name = $_POST["father_name"];
    $father_occupation = $_POST["father_occupation"];
    $mother_name = $_POST["mother_name"];
    $mother_occupation = $_POST["mother_occupation"];
    $address1 = ucwords($_POST["address1"]);
    $address2 = ucwords($_POST["address2"]);
    $adhar_card_number = $_POST["adhar_card_number"];
    $given_card = $_POST["given_card"];
    $district = ucwords($_POST["district"]);
    $taluk = ucwords($_POST["taluk"]);
    $villege = ucwords($_POST["villege"]);

    $query = "SELECT * FROM customers WHERE CONTACT_NUMBER = '$contact_number'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    
    if($row) {
        echo "<script>
                alert('Customer ".$row['NAME']." with contact number $contact_number already exists!');
                window.history.back();
              </script>";
    } else {
        $query = "INSERT INTO customers (name, AGE, DATE_OF_BIRTH, CONTACT_NUMBER, ALTERNATIVE_NUMBER, FATHER_NAME, FATHER_OCCUPATION, MOTHER_NAME, MOTHER_OCCUPATION, ADDRESS1, ADDRESS2, ADHAR_CARD_NUMBER, GIVEN_CARD, DISTRICT, TALUK, VILLEGE) 
                  VALUES('$name', '$age', '$date_of_birth', '$contact_number', '$alternative_number', '$father_name', '$father_occupation', '$mother_name', '$mother_occupation', '$address1', '$address2', '$adhar_card_number', '$given_card', '$district', '$taluk', '$villege')";
        $result = mysqli_query($con, $query);
        
        if(!empty($result)) {
            echo "<script>
                    alert('$name added successfully!');
                    window.location.href = document.referrer;
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to add $name!');
                    window.history.back();
                  </script>";
        }
    }
}
?>
