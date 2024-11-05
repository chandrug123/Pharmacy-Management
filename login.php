<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">

    <!-- External JavaScript Files -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/validateForm.js"></script>

    <!-- Inline JavaScript for session check -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        fetch("php/db_connection.php?action=is_logged_in")
          .then(response => response.text())
          .then(data => {
            if (data === "") {
              window.location.href = "http://localhost/Pharmacy-Management/index.html";
            } else if (data === "true") {
              window.location.href = "http://localhost/Pharmacy-Management/home.php";
            }
          })
          .catch(error => console.error('Error:', error));
      });
    </script>
  </head>
  <body>
    <div class="container">
      <!-- Login Form -->
      <div id="login-form" class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" action="home.php" method="post" onsubmit="return validateCredentials();">
            <div class="logo text-center">
              <img src="images/prof.jpg" class="profile" alt="Profile Image"/>
              <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input name="username" type="text" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
            </div>
          </form>
        </div>

        <div class="card-footer">
          <div class="text-center">
            <a class="text-light" href="javascript:void(0);" onclick="displayForgotPasswordForm();">Forgot password?</a>
          </div>
        </div>
      </div>

      <!-- Forgot Password Form -->
      <div id="forgot-password-form" class="card m-auto p-2" style="display: none;">
        <div class="card-body">
          <div class="logo text-center">
            <img src="images/prof.jpg" class="profile" alt="Profile Image"/>
            <h1 class="logo-caption"><span class="tweak">F</span>orget <span class="tweak">P</span>assword</h1>
          </div>
          <div id="email-number-fields">
            <p class="h6 text-center text-light">Enter email and contact number below to reset your credentials.</p>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
              </div>
              <input id="email" type="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone text-white"></i></span>
              </div>
              <input id="contact_number" type="tel" class="form-control" placeholder="Enter contact number" required>
            </div>

            <div class="form-group">
              <button class="btn btn-default btn-block btn-custom" onclick="verifyEmailNumber();">Verify</button>
            </div>
          </div>

          <div id="username-password-fields" style="display: none;">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input id="username" type="text" class="form-control" placeholder="Enter username" required>
              <div id="username_error" class="text-danger small mt-1" style="display: none;"></div>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock text-white"></i></span>
              </div>
              <input id="password" type="password" class="form-control" placeholder="Enter password" required>
              <div id="password_error" class="text-danger small mt-1" style="display: none;"></div>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input id="confirm_password" type="password" class="form-control" placeholder="Confirm password" required>
              <div id="confirm_password_error" class="text-danger small mt-1" style="display: none;"></div>
            </div>

            <div class="form-group">
              <button class="btn btn-default btn-block btn-custom" onclick="updateUsernamePassword();">Reset Password</button>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="text-center">
            <a class="text-light" href="javascript:void(0);" onclick="displayLoginForm();">Login here</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
