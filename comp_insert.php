<?php
// db connection file
include 'db_conn.php';

$date = $_POST['compdate'];
$emp_id = $_POST['emp'];
$type = $_POST['comptype'];
$amount = $_POST['compamt'];
$description = $_POST['compdesc'];

// inserting job history
$res = mysqli_query($conn, "INSERT INTO compensation (employee_id, compensation_type, compensation_description, compensation_amt, cmp_Date) values ('$emp_id', '$type', '$description', '$amount', '$date')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=2");
exit;
?>