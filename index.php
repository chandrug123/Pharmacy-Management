<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pharmacy Management - Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>

    <style>
      .btn-custom {
    background-color: #add8e6; /* Light blue button */
    color: white;
    font-weight: 600;
    border-radius: 4px;
    height: 40px;
    border: none;
  }

  .btn-custom:hover {
    background-color: #87ceeb; /* Slightly darker blue on hover */
  }
  
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff; /* Light blue background */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .card {
    width: 100%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    padding: 20px;
    margin: 20px;
  }

  .logo-caption {
    font-size: 24px;
    font-weight: 600;
    color: #007bff; /* Light blue color */
  }

  .input-group-text {
    background-color: #cce7ff; /* Light blue for input group background */
    border-right: 0;
    border-radius: 4px 0 0 4px;
  }

  .btn-custom {
    background-color: #00aaff; /* Light blue button */
    color: white;
    font-weight: 600;
    border-radius: 4px;
    height: 40px;
  }

  .btn-custom:hover {
    background-color: #0088cc; /* Darker shade of blue on hover */
  }

  .card-footer a {
    color: #00aaff; /* Light blue for links */
    text-decoration: none;
  }

  .card-footer a:hover {
    text-decoration: underline;
  }
</style>

  </head>

  <body>
    <div class="container">
      <div class="card m-auto">
        <div class="card-body">
          <form name="login-form" class="login-form" action="php/user_management.php" method="post" onsubmit="return validateCredentials();">
            <div class="logo">
              <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
            </div> <!-- logo class -->

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input name="username" type="text" class="form-control" placeholder="Username" required>
            </div> <!--input-group class -->

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div> <!-- input-group class -->

            <div class="form-group">
              <button class="btn btn-custom btn-block">Login</button>
            </div>
          </form><!-- form close -->
        </div> <!-- card-body class -->

        <div class="card-footer">
          <div class="text-center">
            <a href="#">Forgot password?</a>
          </div>
        </div> <!-- card-footer class -->
      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>
