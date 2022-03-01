<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$desig = $_POST['otpdesig_upd'];
$amount = $_POST['otpamt_upd'];
$upd_id = $_POST['otpid'];

// stores updated data into the database
$res = $conn->query("UPDATE overtime_pay_set SET amt_per_hour='$amount' WHERE set_pay_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=1");
exit;
?>