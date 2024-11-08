<?php
  require "db_connection.php";
  if($con) {
    $name = ucwords($_GET["name"]);
    $medicine_type = ucwords($_GET["medicine_type"]) ? ucwords($_GET["medicine_type"]) : 'test';
    $packing = strtoupper($_GET["packing"]);
    $generic_name = ucwords($_GET["generic_name"]);
    $suppliers_name = $_GET["suppliers_name"];

    $query = "SELECT * FROM medicines WHERE UPPER(NAME) = '".strtoupper($name)."' AND UPPER(PACKING) = '".strtoupper($packing)."' AND UPPER(SUPPLIER_NAME) = '".strtoupper($suppliers_name)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Medicine $name with $packing already exists by supplier $suppliers_name!";
    else {
      $query = "INSERT INTO medicines (NAME, PACKING, GENERIC_NAME, SUPPLIER_NAME, medicine_type) VALUES('$name', '$packing', '$generic_name', '$suppliers_name', '$medicine_type')";
      $result = mysqli_query($con, $query);
      //var_dump($query);exit;
      if(!empty($result))
  			echo "$name added...";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
