<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Add New Customer</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!-- Including side navigations -->
    <?php include("sections/sidenav.html"); ?>
    <div class="container-fluid">
      <div class="container">
        <!-- Header section -->
        <?php
          require "php/header.php";
          createHeader('handshake', 'Add Customer', 'Add New Customer');
        ?>
        
        <!-- Form Content Start -->
         <form method="post" action = "php/add_new_customer.php">
        <div class="container">
            <!-- Customer Name and Age Control -->
            <div class="row">
                <div class="col-md-4 col-lg-4 form-group">
                    <label class="font-weight-bold" for="name">Name :</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                </div>

                <div class="col-md-2 form-group col-lg-2">
                    <label class="font-weight-bold" for="age">Age</label>
                    <input type="number" min="1" max="100" class="form-control" placeholder="Age" id="age" name="age" required>
                </div>

                <div class="col-md-3 col-lg-3">
                    <label class="font-weight-bold" for="date_of_birth">Date Of Birth</label>
                    <input type="date" class="form-control" placeholder="DOB" id="date_of_birth" name="date_of_birth" required>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="row">
                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="contact_number">Contact Number :</label>
                    <input type="tel" pattern="\d{10}" name="contact_number" class="form-control" placeholder="Contact Number" id="contact_number" required>
                </div>

                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="alternative_number">Alternative Number :</label>
                    <input type="tel" pattern="\d{10}" name="alternative_number" class="form-control" placeholder="Alternative Number" id="alternative_number">
                </div>
            </div>

            <!-- Parent Information -->
            <div class="row">
                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="father_name">Father's Name :</label>
                    <input type="text" class="form-control" placeholder="Father's Name" name="father_name" id="father_name" required>
                </div>

                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="father_occupation">Father's Occupation :</label>
                    <select name="father_occupation" id="father_occupation" class="form-control" required>
                        <option value="Business Owner/Entrepreneur">Business Owner/Entrepreneur</option>
                        <option value="Government Employee">Government Employee</option>
                        <option value="Farmer">Farmer</option>
                        <option value="Engineer">Engineer</option>
                        <option value="Teacher/Educator">Teacher/Educator</option>
                        <option value="IT Professional">IT Professional</option>
                        <option value="Lawyer/Legal Consultant">Lawyer/Legal Consultant</option>
                        <option value="Construction Worker/Contractor">Construction Worker/Contractor</option>
                        <option value="Banker/Financial Advisor">Banker/Financial Advisor</option>
                        <option value="Sales Executive/Manager">Sales Executive/Manager</option>
                        <option value="Doctor/Healthcare Professional">Doctor/Healthcare Professional</option>
                        <option value="Mechanic/Automobile Technician">Mechanic/Automobile Technician</option>
                        <option value="Artist/Creative Professional">Artist/Creative Professional</option>
                    </select>
                </div>

                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="mother_name">Mother's Name :</label>
                    <input type="text" class="form-control" placeholder="Mother's Name" name="mother_name" id="mother_name" required>
                </div>

                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="mother_occupation">Mother's Occupation :</label>
                    <select name="mother_occupation" id="mother_occupation" class="form-control" required>
                        <option value="Housewife/Homemaker">Housewife/Homemaker</option>
                        <option value="Teacher/Educator">Teacher/Educator</option>
                        <option value="Healthcare Professional">Healthcare Professional</option>
                        <option value="IT Professional">IT Professional</option>
                        <option value="Government Employee">Government Employee</option>
                    </select>
                </div>
            </div>

            <!-- Address Information -->
            <div class="row">
                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="address1">Address 1:</label>
                    <textarea class="form-control" name="address1" placeholder="Address 1" id="address1" required></textarea>
                </div>

                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="address2">Address 2:</label>
                    <textarea class="form-control" name="address2" placeholder="Address 2" id="address2"></textarea>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="row">
                <div class="col-md-3 col-lg-6 form-group">
                    <label class="font-weight-bold" for="adhar_card_number">Aadhar Card Number :</label>
                    <input type="number" class="form-control" name="adhar_card_number" placeholder="Aadhar Card Number" id="adhar_card_number" required>
                </div>

                <div class="col-md-4 col-lg-6 form-group">
                    <label class="font-weight-bold" for="given_card">Given Card :</label>
                    <select class="form-control" id="given_card" name="given_card" required>
                        <option value="Platinum">Platinum Members</option>
                        <option value="Gold">Gold Members</option>
                        <option value="Silver">Silver Members</option>
                    </select>
                </div>
            </div>

            <!-- Location Information -->
            <div class="row">
                <div class="col-md-3 col-lg-3 form-group">
                    <label class="font-weight-bold" for="district">District :</label>
                    <select name="district" id="district" class="form-control" required>
                        <option value="" selected="selected">Select District</option>
                    </select>
                </div>
                
                <div class="col-md-3 col-lg-5 form-group">
                    <label class="font-weight-bold" for="taluk">Taluk :</label>
                    <select name="taluk" id="taluk" class="form-control" required>
                        <option value="" selected="selected">Please select district first</option>
                    </select>
                </div>
                
                <div class="col-md-4 col-lg-4 form-group">
                    <label class="font-weight-bold" for="villege">Village :</label>
                    <select name="villege" id="villege" class="form-control" required>
                        <option value="" selected="selected">Please select taluk first</option>
                    </select>
                </div>
            </div>

            <!-- Form Submit Button -->
            <div class="col-md-12">
                <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid #02b6ff;">
            </div>
            <div class="row col-md-12">
                <div class="form-group m-auto">
                    <button class="btn btn-primary" type="submit">ADD</button>
                </div>
            </div>

            <!-- Result Message -->
            <div id="customer_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>
        </div>
</form>
        <!-- Form Content End -->

        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>

    <!-- JavaScript for Dynamic Dropdown -->
    <script>
        var districtObject = {
            "Koppal": { "Gangavathi": ["GV1", "GV2"], "Koppal": ["Koppala", "Ginageri"], "Yelburga": ["YV1", "YV2"] },
            "Bellary": { "Bellary": ["BV1", "BV2"], "Siruguppa": ["SV1", "SV2"] },
            "Vijayanagara": { "Kudligi": ["KV1", "KV2"], "Hospet": ["HV1", "HV2"] }
        };

        window.onload = function () {
            var districtSel = document.getElementById("district");
            var talukSel = document.getElementById("taluk");
            var villegeSel = document.getElementById("villege");

            for (var x in districtObject) {
                districtSel.options[districtSel.options.length] = new Option(x, x);
            }

            districtSel.onchange = function () {
                talukSel.length = 1;
                villegeSel.length = 1;
                for (var y in districtObject[this.value]) {
                    talukSel.options[talukSel.options.length] = new Option(y, y);
                }
            };

            talukSel.onchange = function () {
                villegeSel.length = 1;
                var z = districtObject[districtSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    villegeSel.options[villegeSel.options.length] = new Option(z[i], z[i]);
                }
            };
        };
    </script>
</body>
</html>
