var isAdmin = "false"; // This variable may be removed if not used

function sendRequest(action, params, callback) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState === 4) {
      if (xhttp.status === 200) {
        callback(xhttp.responseText.trim());
      } else {
        alert("Error communicating with the server.");
      }
    }
  };
  const queryString = new URLSearchParams(params).toString();
  xhttp.open("GET", `php/validateCredentials.php?action=${action}&${queryString}`, true);
  xhttp.send();
}

function validate() {
  const uname = document.forms["login-form"]["username"].value;
  const pswd = document.forms["login-form"]["password"].value;

  sendRequest('is_admin', { uname: encodeURIComponent(uname), pswd: encodeURIComponent(pswd) }, function(response) {
    if (response === "true") {
      window.location.href = "dashboard.html";
    } else {
      alert("Invalid username or password.");
    }
  });
}

function validateAndSetup() {
  const pharmacyName = document.getElementById('pharmacy_name');
  const address = document.getElementById('address');
  const email = document.getElementById('email');
  const contactNumber = document.getElementById('contact_number');
  const username = document.getElementById('username');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm_password');

  if (!validateName(pharmacyName.value, 'pharmacy_name_error')) {
    pharmacyName.focus();
  } else if (!validateAddress(address.value, 'address_error')) {
    address.focus();
  } else if (!notNull(email.value, 'email_error')) {
    email.focus();
  } else if (!validateContactNumber(contactNumber.value, 'contact_number_error')) {
    contactNumber.focus();
  } else if (!notNull(username.value, 'username_error')) {
    username.focus();
  } else if (username.value.includes(' ')) {
    showError('username_error', "mustn't contain spaces!", username);
  } else if (password.value.includes(' ')) {
    showError('password_error', "mustn't contain spaces!", password);
  } else if (password.value.length < 6) {
    showError('password_error', "must be of length 6 or more characters!", password);
  } else if (password.value !== confirmPassword.value) {
    showError('confirm_password_error', "password mismatch!", confirmPassword);
  } else {
    const confirmation = prompt("Please type 'CONFIRM' below to complete setup!");
    if (confirmation === "CONFIRM") {
      storeAdminInfo(pharmacyName.value, address.value, email.value, contactNumber.value, username.value, password.value);
      return true;
    }
  }
  return false;
}

function storeAdminInfo(pharmacyName, address, email, contactNumber, username, password) {
  sendRequest('store_admin_info', {
    pharmacy_name: pharmacyName,
    address: address,
    email: email,
    contact_number: contactNumber,
    username: username,
    password: password
  }, function(response) {
    alert(response);
  });
}

function isSetupDone() {
  sendRequest('is_setup_done', {}, function(response) {
    if (response === "true") {
      window.location.href = "http://localhost/Pharmacy-Management/login.php";
    }
  });
}

function displayForgotPasswordForm() {
  document.getElementById("forgot-password-form").style.display = "block";
  document.getElementById("login-form").style.display = "none";
}

function displayLoginForm() {
  document.getElementById("forgot-password-form").style.display = "none";
  document.getElementById("login-form").style.display = "block";
}

function verifyEmailNumber() {
  const email = document.getElementById("email").value;
  const contactNumber = document.getElementById("contact_number").value;

  sendRequest('verify_email_number', { email: email, contact_number: contactNumber }, function(response) {
    if (response === "true") {
      document.getElementById("email-number-fields").style.display = "none";
      document.getElementById("username-password-fields").style.display = "block";
    } else {
      alert("Invalid email or contact number!");
    }
  });
}

function updateUsernamePassword() {
  const username = document.getElementById('username');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm_password');

  if (!notNull(username.value, 'username_error')) {
    username.focus();
  } else if (username.value.includes(' ')) {
    showError('username_error', "mustn't contain spaces!", username);
  } else if (password.value.includes(' ')) {
    showError('password_error', "mustn't contain spaces!", password);
  } else if (password.value.length < 6) {
    showError('password_error', "must be of length 6 or more characters!", password);
  } else if (password.value !== confirmPassword.value) {
    showError('confirm_password_error', "password mismatch!", confirmPassword);
  } else {
    updateCredentials(username.value, password.value);
  }
  return false;
}

function updateCredentials(username, password) {
  sendRequest('update_username_password', { username: username, password: password }, function(response) {
    if (response === "true") {
      alert("New username and password set successfully.");
      displayLoginForm();
    } else {
      alert("Failed to reset password!");
    }
  });
}

function showError(elementId, message, focusElement) {
  document.getElementById(elementId).style.display = "block";
  document.getElementById(elementId).innerHTML = message;
  if (focusElement) focusElement.focus();
}
