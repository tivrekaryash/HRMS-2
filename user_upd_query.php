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
if($res = $conn->query("UPDATE user_details SET username='$username_upd', password='$password_upd' WHERE user_id='$upd_id'"))
{
// redirects to display employee information after closing connection
$conn->close();
header("location:user_reg_view.php?c=1");
exit;
}

else
echo "fail";
?>