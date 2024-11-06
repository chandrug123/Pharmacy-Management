<?php
require "db_connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM admin_credentials WHERE USERNAME = ? AND PASSWORD = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row['role'];
        $_SESSION["username"] = $username; // Set session variable
        $_SESSION["role"] = $role; // Set session variable
        $_SESSION["loggedin"] = 1; // Set session variable
        // Redirect to the dashboard or another page
        header("Location: redirects.php");
        exit;
    } else {
        echo "<script>alert('Invalid username or password'); window.location.href='/pharmacy/';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
} else {
    echo "Invalid request method.";
}
?>
