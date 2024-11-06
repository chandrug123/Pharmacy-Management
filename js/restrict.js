const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (xhttp.readyState === 4 && xhttp.status === 200) {
    const response = xhttp.responseText.trim(); // Trim to handle any whitespace
    if (response === "") {
      window.location.href = "http://localhost/Pharmacy-Management/index.html";
    } else if (response === "false") {
      window.location.href = "http://localhost/Pharmacy-Management/login.php";
    }
  }
};
xhttp.open("GET", "php/db_connection.php?action=is_logged_in", true); // true for asynchronous request
xhttp.send();
