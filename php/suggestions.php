<?php
  require "db_connection.php";

  if($con) {
    if(isset($_GET['action']) && $_GET['action'] == "supplier")
      showSuggestions($con, "suppliers", "supplier");

    if(isset($_GET['action']) && $_GET['action'] == "customer")
      showSuggestions($con, "customers", "customer");

    if(isset($_GET['action']) && $_GET['action'] == "medicine")
      showSuggestions($con, "medicines", "medicine");

    if(isset($_GET['action']) && $_GET['action'] == "customers_address")
      getValue($con, $_GET['action'], "ADDRESS1");

    if(isset($_GET['action']) && $_GET['action'] == "customers_contact_number")
      getValue($con, $_GET['action'], "CONTACT_NUMBER");

      if(isset($_GET['action']) && $_GET['action'] == "sub_type")
        getValue($con, $_GET['action'], "GIVEN_CARD");
  }

  function showSuggestions($con, $table, $action) {
    // Sanitize and validate the input text
    $text = isset($_GET["text"]) ? strtoupper(trim($_GET["text"])) : '';

    if (empty($text)) {
        echo '<div class="list-group-item list-group-item-action font-italic" style="padding: 5px;" disabled>No suggestions...</div>';
        return;
    }

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM $table WHERE UPPER(NAME) LIKE ?";
    $stmt = mysqli_prepare($con, $query);
    $searchTerm = '%' . $text . '%';
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 's', $searchTerm);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 0) {
        echo '<div class="list-group-item list-group-item-action font-italic" style="padding: 5px;" disabled>No suggestions...</div>';
    } else {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // Escape output to prevent XSS
            $name = htmlspecialchars($row['NAME'], ENT_QUOTES, 'UTF-8');
            echo '<input type="button" class="list-group-item list-group-item-action" value="' . $name . '" style="padding: 5px; outline: none;" onclick="suggestionClick(this.value, \'' . $action . '\');">';
        }
    }

    // Close the statement to free up resources
    mysqli_stmt_close($stmt);
}


  function getValue($con, $action, $column) {
    $name = $_GET['name'];
    $query = "SELECT * FROM customers WHERE NAME = '$name'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result))
      echo $row[$column];
  }
?>
