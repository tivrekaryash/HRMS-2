<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$role_upd = $_POST['userrole_upd'];
$username_upd = $_POST['username_upd'];
$password_upd = password_hash($_POST['pass_upd'], PASSWORD_DEFAULT);
$upd_id = $_POST['us_id'];

// stores updated data into the database
$res = $conn->query("UPDATE user_details SET role_id='$role_upd' username='$username_upd' password='$password_upd' WHERE user_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:user_reg_view.php?c=1");
exit;
?>