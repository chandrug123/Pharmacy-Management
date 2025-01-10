<?php
// Include the database connection file
require "../php/db_connection.php";

// Check if the 'id' is passed via POST request
if (isset($_POST['id'])) {
    // Sanitize the incoming ID to prevent SQL injection
    $id = mysqli_real_escape_string($con, $_POST['id']);

    // Query to delete the user from the database
    $query = "DELETE FROM admin_credentials WHERE id = $id";
    
    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the deletion was successful
    if ($result) {
        echo 'success';  // Return success message
    } else {
        echo 'error';  // Return error message if something went wrong
    }
} else {
    echo 'error';  // Return error if ID is not provided
}
?>
