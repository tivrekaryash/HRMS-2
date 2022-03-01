<?php
// db connection file
include 'db_conn.php';

// employee id that needs to be deleted
$del_id = $_GET['del'];

// deleting all overtime payment 
$sql = mysqli_query($conn, "delete from overtime_pay_emp where set_pay_id = '$del_id'");

// deleting designation
$sql = mysqli_query($conn, "delete from overtime_pay_set where set_pay_id = '$del_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=1");
exit;

?>