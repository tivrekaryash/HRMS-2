<?php
// db connection file
include 'db_conn.php';

// user id that needs to be deleted
$del_id = $_GET['del'];

// deleting user
$sql = mysqli_query($conn, "delete from user_details where user_id = '$del_id'");

// redirects to display user details page
$conn->close();
header("location:user_reg_view.php?c=1");
exit;

?>