function notNull(text, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(text < 0) {
    result.innerHTML = "Invalid!";
    return false;
  }
  else if(text.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;
  }
  result.style.display = "none";
  return true;
}

function validateName(name, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(name.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;
  }
  result.innerHTML = "Must contain only letters!";
  for(var i = 0; i < name.length; i++)
    if(!((name[i] >= 'a' && name[i] <= 'z') || (name[i] >= 'A' && name[i] <= 'Z') || name[i] == ' '))
      return false;
  result.style.display = "none";
  return true;
}

function validateContactNumber(contact_number, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(contact_number.length != 10) {
    result.innerHTML = "Must contain 10 digits!";
    return false;
  }
  else
    result.style.display = "none";
  return true;
}

function validateAddress(address, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(address.trim().length < 10) {
    result.innerHTML = "Please enter more specific address!";
    return false;
  }
  else
    result.style.display = "none";
  return true;
}

function checkExpiry(date, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(date.trim() == "" || date.trim().length != 5 || date[2] != "/")
    result.innerHTML = "Please enter date in mm/yy format!";
  else if(date.slice(0, 2) < 1 || date.slice(0, 2) > 12)
    result.innerHTML = "Invalid month!";
  else if(new Date("20" + date.slice(3, 5), date.slice(0, 2)) < new Date()) {
    result.innerHTML = "Expired Medicine!";
    return -1;
  }
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function checkQuantity(quantity, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(quantity < 0 || !Number.isInteger(parseFloat(quantity)))
    result.innerHTML = "Invalid quantity!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function checkValue(value, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(value < 0 || value == "")
    result.innerHTML = "Invalid!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function checkDate(date, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(date == "")
    result.innerHTML = "Mustn't be empty!!";
  else if(new Date(date) > new Date())
    result.innerHTML = "Mustn't be future date!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}
function addCustomer() {
  document.getElementById("customer_acknowledgement").innerHTML = "";

  // Collecting input values
  var inputs = {
    //customer_name: document.getElementById("customer_name").value,
    //contact_number: document.getElementById("customer_contact_number").value,
    //customer_address: document.getElementById("customer_address").value,
    //doctor_name: document.getElementById("customer_doctors_name").value,
    //doctor_address: document.getElementById("customer_doctors_address").value,
    name: document.getElementById("name").value,
    age: document.getElementById("age").value,
    date_of_birth: document.getElementById("date_of_birth").value,
    contact_number: document.getElementById("contact_number").value,
    alternative_number: document.getElementById("alternative_number").value,
    father_name: document.getElementById("father_name").value,
    father_occupation: document.getElementById("father_occupation").value,
    mother_name: document.getElementById("mother_name").value,
    mother_occupation: document.getElementById("mother_occupation").value,
    address1: document.getElementById("address1").value,
    address2: document.getElementById("address2").value,
    adhar_card_number: document.getElementById("adhar_card_number").value,
    given_card: document.getElementById("given_card").value,
    district: document.getElementById("district").value,
    taluk: document.getElementById("taluk").value,
    villege: document.getElementById("villege").value
  };

  // Validation checks
  if (!validateName(inputs.name, "name_error")) {
    document.getElementById("name").focus();
  }  else {
    // Creating the query string
    var queryString = Object.keys(inputs)
      .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(inputs[key]))
      .join('&');

    // Sending the AJAX request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState === 4 && xhttp.status === 200) {
        document.getElementById("customer_acknowledgement").innerHTML = xhttp.responseText;
      }
    };
    xhttp.open("GET", "php/add_new_customer.php?" + queryString, true);
    xhttp.send();
  }
  return false;
}

function addSupplier() {
  document.getElementById("supplier_acknowledgement").innerHTML = "";
  var supplier_name = document.getElementById("supplier_name");
  var supplier_email = document.getElementById("supplier_email");
  var contact_number = document.getElementById("supplier_contact_number");
    var supplier_address = document.getElementById("supplier_address");
  if(!validateName(supplier_name.value, "name_error"))
    supplier_name.focus();
  else if(!validateContactNumber(contact_number.value, "contact_number_error"))
    contact_number.focus();
  else if(!validateAddress(supplier_address.value, "address_error"))
    supplier_address.focus();
  else {
    var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
  		if(xhttp.readyState = 4 && xhttp.status == 200)
  			document.getElementById("supplier_acknowledgement").innerHTML = xhttp.responseText;
  	};
  	xhttp.open("GET", "php/add_new_supplier.php?name=" + supplier_name.value + "&email=" + supplier_email.value + "&contact_number=" + contact_number.value + "&address=" + supplier_address.value, true);
  	xhttp.send();
  }
}

function addMedicine() {
  document.getElementById("medicine_acknowledgement").innerHTML = "";
  var name = document.getElementById("medicine_name");
  var packing = document.getElementById("packing");
  var medicine_type = document.getElementById("medicine_type");
  var generic_name = document.getElementById("generic_name");
  var suppliers_name = document.getElementById("suppliers_name");
  if(!notNull(name.value, "medicine_name_error"))
    name.focus();
  else if(!notNull(packing.value, "pack_error"))
    packing.focus();
  else if(!notNull(generic_name.value, "generic_name_error"))
    generic_name.focus();
  else {
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
        if (xhttp.status == 200) {
            // Display success message
            document.getElementById("medicine_acknowledgement").innerHTML = xhttp.responseText;
            alert("Success: Medicine added successfully!");
        } else {
            // Display failure message
            alert("Error: Failed to add the medicine.");
        }
    }
};
xhttp.open("GET", "php/add_new_medicine.php?name=" + name.value + "&packing=" + packing.value + "&generic_name=" + generic_name.value + "&suppliers_name=" + suppliers_name.value + "&medicine_type=" + medicine_type.value, true);
xhttp.send();

  }
}
