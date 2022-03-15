<?php
// db connection file
include 'db_conn.php';

// taking details from the form
$user_role = $_POST['userrole'];
$username = $_POST['username'];

// taking the password from the form and hashing it before storing it in the database
$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// creating the user
$res = mysqli_query($conn, "INSERT INTO user_details (role_id, username, password) values ('$user_role', '$username', '$password')");

// redirects to user details page
$conn->close();
header("location:user_reg_view.php?c=1");
exit;
?>