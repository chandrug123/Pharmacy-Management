<?php
ini_set('display_errors', 1);
ini_set('error_log', 'path/to/error_log.txt');

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Attempt to retrieve session variables
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
$role = isset($_SESSION["role"]) ? $_SESSION["role"] : null;

// If session variables are missing, try restarting the session
if ($username === null || $role === null) {
    // Restart session
    session_write_close(); // Close the current session if it's open
    session_start(); // Restart session

    // Try to fetch the session data again
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
    $role = isset($_SESSION["role"]) ? $_SESSION["role"] : null;

    // Log error if session data is still missing
    if ($username === null || $role === null) {
        error_log("Session data missing for username or role.");
        header('Location: login.php');
        exit;
    }
}

// If session data is available, proceed
$displayifadmin = ($role == 'admin') ? 'block' : 'none';
$displayifstaff = ($role == 'admin' || $role == 'staff') ? 'block' : 'none';
$displayifpharmacy = ($role == 'admin' || $role == 'pharmacy') ? 'block' : 'none';

?>

<script type="text/javascript">
  var pid = "none";
  function showhide(id) {
    var elements = document.getElementById(id).childNodes;
    var menu = elements[3];
    var arrow = ((elements[1].childNodes)[4].childNodes)[1];
    if(menu.style.display == 'block') {
      menu.style.display = "none";
      arrow.style.transform = "rotate(0deg)";
      elements[1].style.color = "#eeeeee";
    }
    else {
      menu.style.display = "block";
      arrow.style.transform = "rotate(270deg)";
      elements[1].style.color = "#ff5252";
    }
    if(pid == id)
      pid = "none";
    if(pid != "none") {
      elements = document.getElementById(pid).childNodes;
      menu = (document.getElementById(pid).childNodes)[3];
      arrow = ((elements[1].childNodes)[4].childNodes)[1];
      if(menu.style.display == 'block') {
        menu.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
        elements[1].style.color = "#eeeeee";
      }
    }
    pid = id;
  }

  function showOptions() {
    var flag = document.getElementById('options');
    if(flag.style.display == 'block') {
      flag.style.display = "none";
      document.getElementById('mark').style.display = "none";
    }
    else {
      flag.style.display = "block";
      document.getElementById('mark').style.display = "block";
    }
  }
</script>

<div class="sidenav">
  <div class="card">
    <div class="card-body">
      <div class="logo" style="display: <?php echo $displayifadmin; ?>;">
        <h1 class="logo-caption"><span class="tweak">A</span>dmin</h1>
      </div> <!-- logo class -->

      <!-- dashboard start -->
      <div class="main-menu-item">
        <a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
      </div>
      <!-- dashboard end -->

      <!-- invoice strat -->
      <div id="first" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifpharmacy; ?>;">
      	<a  href="#">
      		<i class="fa fa-balance-scale"></i><span>Invoice</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		<li class="treeview"><a href="new_invoice.php">New Invoice</a></li>
      		<li class="treeview"><a href="manage_invoice.php">Manage Invoice </a></li>
      	</ul>
      </div>
      <!-- invoice end -->

      <!-- customer end -->
      <div id="second" class="main-menu-item" onclick="showhide(this.id);">
      	<a href="#">
      		<i class="fa fa-handshake"></i><span>Customer</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		<li class="treeview"><a href="add_customer.php">Add Customer</a></li>
      		<li class="treeview"><a href="manage_customer.php">Manage Customer</a></li>
      	</ul>
      </div>
      <!-- customer end -->

      <!-- medicine strat -->
      <div id="third" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifpharmacy; ?>;">
      	<a href="#">
      		<i class="fa fa-shopping-bag"></i><span>Medicine</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		<li class="treeview"><a href="add_medicine.php">Add Medicine</a></li>
      		<li class="treeview"><a href="manage_medicine.php">Manage Medicine</a></li>
          <li class="treeview"><a href="manage_medicine_stock.php">Manage Medicine Stock</a></li>
      	</ul>
      </div>
      <!-- medicine end -->

      <!-- manufacturer start -->
      <div id="fourth" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifadmin; ?>;">
      	<a href="#">
      		<i class="fa fa-group"></i><span>Supplier</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		<li class="treeview"><a href="add_supplier.php">Add Supplier</a></li>
      		<li class="treeview"><a href="manage_supplier.php">Manage Supplier</a></li>
      	</ul>
      </div>
      <!-- manufacturer end -->

      <!-- purchase start -->
      <div id="fifth" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifadmin; ?>;">
      	<a href="#">
      		<i class="fa fa-bar-chart"></i><span>Purchase</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		<li class="treeview"><a href="add_purchase.php">Add Purchase</a></li>
      		<li class="treeview"><a href="manage_purchase.php">Manage Purchase</a></li>
      	</ul>
      </div>
      <!-- purchase end -->

      <!-- report start -->
      <div id="sixth" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifadmin; ?>;">
      	<a href="#">
      		<i class="fa fa-book"></i><span>Report</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
          <li class="treeview"><a href="sales_report.php">Sales Report</a></li>
      		<li class="treeview"><a href="purchase_report.php">Purchase Report</a></li>
      	</ul>
      </div>
      <!-- report end -->

      <!-- search start -->
      <div id="seventh" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifadmin; ?>;">
      	<a href="#">
      		<i class="fa fa-search"></i><span>Search</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
          <li class="treeview"><a href="manage_invoice.php">Invoice</a></li>
          <li class="treeview"><a href="manage_customer.php">Customer</a></li>
      		<li class="treeview"><a href="manage_medicine.php">Medicine</a></li>
          <li class="treeview"><a href="manage_supplier.php">Supplier</a></li>
      		<li class="treeview"><a href="manage_purchase.php">Purchase</a></li>
      	</ul>
      </div>
      <!-- search end -->


      <!-- User management start -->
      <div id="eigth" class="main-menu-item" onclick="showhide(this.id);" style="display: <?php echo $displayifadmin; ?>;">
      	<a href="#">
      		<i class="fa fa-search"></i><span>User Management</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
          <li class="treeview"><a href="add-user.php">Add User</a></li>
          <li class="treeview"><a href="userlist.php">User List</a></li>
      	</ul>
      </div>
      <!--  User management end -->

    </div> <!-- card-body class -->
  </div> <!-- card  -->
</div>
