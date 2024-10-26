<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/my_profile.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
</head>
<body>
    <!-- Include side navigations -->
    <?php include("sections/sidenav.html"); ?>

    <div class="container-fluid">
        <div class="container">
            <!-- Header section -->
            <?php
                require "php/header.php";
                createHeader('user', 'Profile', 'Manage Admin Details');
                require "php/db_connection.php";

                if ($con) {
                    $username = "admin";
                    $query = "SELECT * FROM admin_credentials WHERE username = '$username'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);
                    
                    $pharmacy_name = $row['name'] ?? "test";
                    $address = $row['address'] ?? "test";
                    $email = $row['email'] ?? "test";
                    $contact_number = $row['contact_number'] ?? "test";
                    $username = $row['USERNAME'] ?? "test";
                }
            ?>
            <div class="row">
                <div class="col-md-6">

                        <!-- Username -->
                        <div class="form-group">
                        <label for="username" class="font-weight-bold">Username:</label>
                        <input id="username" type="text" class="form-control" value="<?php echo htmlspecialchars($username); ?>" placeholder="Username" onkeyup="notNull(this.value, 'username_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="username_error" style="display: none;"></code>
                    </div>

                    <!-- Pharmacy Name -->
                    <div class="form-group">
                        <label for="pharmacy_name" class="font-weight-bold">Name:</label>
                        <input id="pharmacy_name" type="text" class="form-control" value="<?php echo htmlspecialchars($pharmacy_name); ?>" placeholder="Pharmacy Name" onkeyup="validateName(this.value, 'pharmacy_name_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="pharmacy_name_error" style="display: none;"></code>
                    </div>

            

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email:</label>
                        <input id="email" type="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" placeholder="Email" onkeyup="notNull(this.value, 'email_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="email_error" style="display: none;"></code>
                    </div>

                    <!-- Contact Number -->
                    <div class="form-group">
                        <label for="contact_number" class="font-weight-bold">Contact Number:</label>
                        <input id="contact_number" type="number" class="form-control" value="<?php echo htmlspecialchars($contact_number); ?>" placeholder="Contact Number" onkeyup="validateContactNumber(this.value, 'contact_number_error');" disabled>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="contact_number_error" style="display: none;"></code>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address" class="font-weight-bold">Address:</label>
                        <textarea id="address" class="form-control" placeholder="Address" onkeyup="validateAddress(this.value, 'address_error');" style="max-height: 100px;" disabled><?php echo htmlspecialchars($address); ?></textarea>
                        <code class="text-danger small font-weight-bold float-right mb-2" id="address_error" style="display: none;"></code>
                    </div>

                    <!-- Horizontal Line -->
                    <div class="col-md-12">
                        <hr style="border-top: 2px solid #02b6ff;">
                    </div>

                    <!-- Form Action Buttons -->
                    <div class="row m-auto" id="edit">
                        <div class="col-md-4 offset-md-8">
                            <button class="btn btn-primary form-control font-weight-bold" onclick="edit();">EDIT</button>
                        </div>
                        <div class="col-md-4">
                            <a href="change_password.php" class="btn btn-warning form-control font-weight-bold">Change Password</a>
                        </div>
                    </div>

                    <div class="row m-auto" id="update_cancel" style="display: none;">
                        <div class="col-md-4 offset-md-8">
                            <button class="btn btn-danger form-control font-weight-bold" onclick="edit(true);">CANCEL</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success form-control font-weight-bold" onclick="updateAdminDetails();">UPDATE</button>
                        </div>
                    </div>

                    <!-- Result Message -->
                    <div id="admin_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>
                </div>
            </div>
            <hr style="border-top: 2px solid #ff5252;">
        </div>
    </div>
</body>
</html>
