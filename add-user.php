<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Supplier</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
  </head>
  <body>
    <!-- including side navigations -->
    <?php include("sections/sidenav.html");
    require "php/db_connection.php"; // Include your database connection file

if ($con) {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump("test");
        // Get the form values
        $name = ucwords($_POST["name"]);
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
        $email = $_POST["email"];
        $contact_number = $_POST["contact_number"];
        $alternative_number = $_POST["alternative_number"];
        $role = $_POST["role"];
        $address = $_POST["address"];

        // Insert the data into the database
        $query = "INSERT INTO admin_credentials (name, username, password, email, contact_number, alternative_number, role, address) 
                  VALUES ('$name', '$username', '$password', '$email', '$contact_number', '$alternative_number', '$role', '$address')";
       
        $result = mysqli_query($con, $query);
        
        // Check if the insertion was successful
        if ($result) {
            echo "<div class='alert alert-success'>User $name added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to add user: " . mysqli_error($con) . "</div>";
        }
    }
}
?>


    <div class="container-fluid">
      <div class="container">
        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('group', 'Add User', 'Add New User');
          // header section end
        ?>
   <div class="container mt-5">
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number:</label>
            <input type="tel" class="form-control" id="contact_number" name="contact_number" required>
        </div>

        <div class="form-group">
            <label for="alternative_number">Alternative Number:</label>
            <input type="tel" class="form-control" id="alternative_number" name="alternative_number">
        </div>

        <div class="form-group">
    <label for="role">Role:</label>
    <select class="form-control" id="role" name="role" required>
        <option value="" disabled selected>Select Role</option>
        <option value="Pharmacy">Pharmacy</option>
        <option value="Staff">Staff</option>
    </select>
</div>



       

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Add User</button>
    </form>
</div>
        <hr style="border-top: 2px solid #ff5252;">

      </div>
    </div>
  </body>
</html>