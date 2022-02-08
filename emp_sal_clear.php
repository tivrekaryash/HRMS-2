<?php
// db connection file
require_once 'db_conn.php';

// fetches record to be cleared
$clearance_id = $_GET['clr'];

// clears record
$res = $conn->query("UPDATE employee_salary SET clearance='cleared' WHERE salary_id='$clearance_id'");

// redirects to display salary information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=0");
exit;
?>