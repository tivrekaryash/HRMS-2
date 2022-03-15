<?php
// db connection file
include 'db_conn.php';

// leave type id that needs to be deleted
$del_id = $_GET['del'];

// deleting users
$sql = mysqli_query($conn, "delete from user_details where role_id = '$del_id'");

// deleting role
$sql = mysqli_query($conn, "delete from user_role where role_id = '$del_id'");

// redirects to user role page
$conn->close();
header("location:user_reg_view.php?c=0");
exit;

?>