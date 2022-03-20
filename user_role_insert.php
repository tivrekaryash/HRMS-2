<?php
// db connection file
include 'db_conn.php';

$role_name = $_POST['role'];

// inserting job history
$res = mysqli_query($conn, "INSERT INTO user_role (role) values ('$role_name')");

if ($res) {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:user_reg_view.php?c=0");
    exit;
} else {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:user_reg_view.php?c=0&e=1");
    exit;
}
?>