<?php
require "db_connection.php";

if($con) {
    if(isset($_GET["action"]) && $_GET["action"] == "delete") {
        $id = $_GET["id"];
        $query = "DELETE FROM admin_credentials WHERE id = $id";
        $result = mysqli_query($con, $query);
        if(!empty($result))
            showUsers(0);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit") {
        $id = $_GET["id"];
        showUsers($id);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "update") {
        $id = $_GET["id"];
        $username = $_GET["username"];
        $password = $_GET["password"];
        $email = $_GET["email"];
        $phone = $_GET["phone"];
        updateUser($id, $username, $password, $email, $phone);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "cancel")
        showUsers(0);

    if(isset($_GET["action"]) && $_GET["action"] == "search")
        searchUser(strtoupper($_GET["text"]));
}

function showUsers($id) {
    require "db_connection.php";
    if($con) {
        $seq_no = 0;
        $query = "SELECT * FROM admin_credentials";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)) {
            $seq_no++;
            if($row['id'] == $id)
                showEditOptionsRow($seq_no, $row);
            else
                showUserRow($seq_no, $row);
        }
    }
}

function showUserRow($seq_no, $row) {
    ?>
    <tr>
        <td><?php echo $seq_no; ?></td>
        <td><?php echo $row['USERNAME'] ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact_number']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td>
            <button class="btn btn-info btn-sm" onclick="editUser(<?php echo $row['id']; ?>);">
                <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-danger btn-sm" onclick="deleteUser(<?php echo $row['id']; ?>);">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
    <?php
}

function showEditOptionsRow($seq_no, $row) {
    ?>
    <tr>
        <td><?php echo $seq_no; ?></td>
        <td><?php echo $row['id'] ?></td>
        <td>
            <input type="text" class="form-control" value="<?php echo $row['USERNAME']; ?>" placeholder="Username" id="user_username">
        </td>
        <td>
            <input type="text" class="form-control" value="<?php echo $row['EMAIL']; ?>" placeholder="Email" id="user_email">
        </td>
        <td>
            <input type="text" class="form-control" value="<?php echo $row['PHONE']; ?>" placeholder="Phone" id="user_phone">
        </td>
        <td>
            <button class="btn btn-success btn-sm" onclick="updateUser(<?php echo $row['id']; ?>);">
                <i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-danger btn-sm" onclick="cancel();">
                <i class="fa fa-close"></i>
            </button>
        </td>
    </tr>
    <?php
}

function updateUser($id, $username, $password, $email, $phone) {
    require "db_connection.php";
    $query = "UPDATE admin_credentials SET USERNAME = '$username', PASSWORD = '$password', EMAIL = '$email', PHONE = '$phone' WHERE id = $id";
    $result = mysqli_query($con, $query);
    if(!empty($result))
        showUsers(0);
}

function searchUser($text) {
    require "db_connection.php";
    if($con) {
        $seq_no = 0;
        $query = "SELECT * FROM admin_credentials WHERE UPPER(USERNAME) LIKE '%$text%'";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)) {
            $seq_no++;
            showUserRow($seq_no, $row);
        }
    }
}
?>
