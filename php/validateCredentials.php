<?php

require "db_connection.php";
session_start();

if ($con) {
  $action = $_GET['action'] ?? null;

  switch ($action) {
    case 'is_setup_done':
      isSetupDone($con);
      break;
    case 'is_admin':
      isAdmin($con);
      break;
    // Other cases remain unchanged
  }
} else {
  echo "Database connection failed.";
}

function isAdmin($con) {
  $username = $_GET["uname"];
  $password = $_GET["pswd"];

  // Use prepared statements to avoid SQL injection
  $stmt = $con->prepare("SELECT * FROM admin_credentials WHERE USERNAME = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  // Verify password using password_verify for security
  if ($row && password_verify($password, $row['PASSWORD'])) {
    $_SESSION["username"] = $username;
    $_SESSION["role"] = $row['role'];
    echo "true"; // Successful login
  } else {
    echo "false"; // Invalid credentials
  }
}

// Other functions remain unchanged

?>