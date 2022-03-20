<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$username_upd = $_POST['username_upd'];
$password_upd = $_POST['pass_upd'];
$upd_id = $_POST['use_id'];

// hashing the password
$password_upd = password_hash($password_upd, PASSWORD_DEFAULT);

// stores updated data into the database
$res = $conn->query("UPDATE user_details SET username='$username_upd', password='$password_upd' WHERE user_id='$upd_id'");

if ($res) {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:user_reg_view.php?c=1");
    exit;
} else {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:user_reg_view.php?c=1&e=1");
    exit;
}
?>