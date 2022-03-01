<?php
// db connection file
include 'db_conn.php';

$desig = $_POST['otpdesig'];
$amount = $_POST['otpamt'];

// inserting job history
$res = mysqli_query($conn, "INSERT INTO overtime_pay_set (designation_id, amt_per_hour) values ('$desig', '$amount')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=1");
exit;
?>