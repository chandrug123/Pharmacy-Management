// Generalized function for sending GET requests
function sendRequest(url, callback) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState === 4 && xhttp.status === 200) {
      callback(xhttp.responseText);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

// Show suggestions for the given text and action
function showSuggestions(text, action) {
  const url = `php/suggestions.php?action=${action}&text=${encodeURIComponent(text)}`;
  sendRequest(url, (response) => {
    document.getElementById(`${action}_suggestions`).innerHTML = response;
  });
}

// Clear suggestions for the given id
function clearSuggestions(id) {
  const div = document.getElementById(`${id}_suggestions`);
  if (div) {
    div.innerHTML = "";
  }
}

// Handle suggestion click
function suggestionClick(value, id) {
  document.getElementById(`${id}s_name`).value = value;
  if (id === "customer") {
    console.log(`${value} = value & id = ${id}`);
    fillCustomerDetails(value);
  }
  clearSuggestions(id);
  notNull(value, `${id}_name_error`);
}

// Fill customer details based on the selected name
function fillCustomerDetails(name) {
  console.log(name);
  getCustomerDetail("customers_address", name);
  getCustomerDetail("customers_contact_number", name);
  getCustomerDetail("sub_type", name);
  console.log("calling");
}

// Get customer details and update the respective field
function getCustomerDetail(id, name) {
  const url = `php/suggestions.php?action=${id}&name=${encodeURIComponent(name)}`;
  sendRequest(url, (response) => {
    document.getElementById(id).value = response;
  });
}

// Click event listener to close suggestions if clicked outside
document.addEventListener("click", (evt) => {
  const suggestionElements = [
    document.getElementById("supplier_suggestions"),
    document.getElementById("suppliers_name"),
    document.getElementById("customer_suggestions"),
    document.getElementById("customers_name")
  ];
  
  // Check if the click happened outside the suggestions
  let target = evt.target;
  do {
    if (suggestionElements.includes(target)) return;
    target = target.parentNode;
  } while (target);

  // Clear suggestions if clicked outside
  suggestionElements.forEach((el) => {
    if (el) el.innerHTML = "";
  });
});
