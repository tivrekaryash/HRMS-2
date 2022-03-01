<?php
// db connection file
require_once 'db_conn.php';

// fetches record to be cleared
$clearance_id = $_GET['clr'];

// clears record
$res = $conn->query("UPDATE overtime_pay_emp SET clearance='cleared' WHERE otp_pay_id='$clearance_id'");

// redirects to display salary information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=2");
exit;
?>