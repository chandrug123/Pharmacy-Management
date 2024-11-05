<?php
require "db_connection.php";

if ($con && isset($_GET['term'])) {
    $term = mysqli_real_escape_string($con, $_GET['term']);
    $query = "SELECT NAME FROM medicines WHERE NAME LIKE '%$term%' LIMIT 10";
    $result = mysqli_query($con, $query);
    $suggestions = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['NAME'];
    }
    
    echo json_encode($suggestions);
}
?>
