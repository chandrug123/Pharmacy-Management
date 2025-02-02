<?php
  require "db_connection.php";

  if($con) {
    if(isset($_GET["action"]) && $_GET["action"] == "delete") {
      $id = $_GET["id"];
      $query = "DELETE FROM customers WHERE ID = $id";
      $result = mysqli_query($con, $query);
      if(!empty($result))
    		showCustomers(0);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit") {
      $id = $_GET["id"];
      showCustomers($id);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "update") {
      $id = $_GET["id"];
      $name = ucwords($_GET["name"]);
      $age = ucwords($_GET["age"]);
      $contact_number = $_GET["contact_number"];
      $alternative_number = $_GET["alternative_number"];
      $address = ucwords($_GET["address"]);
      $doctor_name = ucwords($_GET["doctor_name"]);
      $doctor_address = ucwords($_GET["doctor_address"]);
      updateCustomer($id, $name, $age, $contact_number, $alternative_number, $address, $doctor_name, $doctor_address);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "cancel")
      showCustomers(0);

    if(isset($_GET["action"]) && $_GET["action"] == "search")
      searchCustomer(strtoupper($_GET["text"]));
  }

  function showCustomers($id) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM customers";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        if($row['ID'] == $id)
          showEditOptionsRow($seq_no, $row);
        else
          showCustomerRow($seq_no, $row);
      }
    }
  }

  function showCustomerRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['ID'] ?></td>
      <td><?php echo $row['NAME']; ?></td>
      <td><?php echo $row['AGE']; ?></td>
      <td><?php echo $row['CONTACT_NUMBER']; ?></td>
      <td><?php echo $row['ALTERNATIVE_NUMBER']; ?></td>
      <td><?php echo $row['GIVEN_CARD']; ?></td>
      <td>
        <button class="btn btn-danger btn-sm" onclick="deleteCustomer(<?php echo $row['ID']; ?>);">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php
  }

function showEditOptionsRow($seq_no, $row) {
  ?>
  <tr>
    <td><?php echo $seq_no; ?></td>
    <td><?php echo $row['ID'] ?></td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['NAME']; ?>" placeholder="Name" id="customer_name" onkeyup="validateName(this.value, 'name_error');">
      <code class="text-danger small font-weight-bold float-right" id="name_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['AGE']; ?>" placeholder="Age" id="customer_age" onkeyup="validateAge(this.value, 'age_error');">
      <code class="text-danger small font-weight-bold float-right" id="age_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['DATE_OF_BIRTH']; ?>" placeholder="Date_of_Birth" id="customer_date_of_birth" onkeyup="validateName(this.value, 'name_error');">
      <code class="text-danger small font-weight-bold float-right" id="name_error" style="display: none;"></code>
    </td>
    <td>
      <input type="number" class="form-control" value="<?php echo $row['CONTACT_NUMBER']; ?>" placeholder="Contact Number" id="customer_contact_number" onblur="validateContactNumber(this.value, 'contact_number_error');">
      <code class="text-danger small font-weight-bold float-right" id="contact_number_error" style="display: none;"></code>
    </td>
    <td>
      <button href="" class="btn btn-success btn-sm" onclick="updateCustomer(<?php echo $row['ID']; ?>);">
        <i class="fa fa-edit"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="cancel();">
        <i class="fa fa-close"></i>
      </button>
    </td>
  </tr>
  <?php
}

function updateCustomer($id, $name, $age, $contact_number, $address, $doctor_name, $doctor_address) {
  require "db_connection.php";
  $query = "UPDATE customers SET NAME = '$name', AGE= '$age', CONTACT_NUMBER = '$contact_number', ADDRESS = '$address', DOCTOR_NAME = '$doctor_name', DOCTOR_ADDRESS = '$doctor_address' WHERE ID = $id";
  $result = mysqli_query($con, $query);
  if(!empty($result))
    showCustomers(0);
}

function searchCustomer($text) {
  require "db_connection.php";
  if($con) {
    $seq_no = 0;
    $query = "SELECT * FROM customers WHERE UPPER(NAME) LIKE '%$text%'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)) {
      $seq_no++;
      showCustomerRow($seq_no, $row);
    }
  }
}

?>
