<?php
  require "db_connection.php";
  if($con) 
  {

    if (isset($_REQUEST['distr']))
    {
        $distr = $_REQUEST['distr'];
        include "db_connection.php";
        $query = "SELECT taluk_name FROM pharmacy.location_management where district_name ='".$distr."'";
        $result = mysqli_query($con, $query);
        $seq_no = 0;
        $taluk = [];
        while($row = mysqli_fetch_array($result)) {

            select_taluk($row['taluk_name']);
          }
       // echo $taluk;
        return $taluk; 
    }
    else
    {
      // send response
      echo "Something went wrong";
    }
  }
?>
  <select class="form-control" name="district">
  <?php 
  function select_taluk($taluk) {
    ?>
      <option value="<?php echo $taluk; ?>"><?php echo $taluk; ?></option>

    <?php
  } ?>
  </select>
