<?php
// db connection file
require_once 'db_conn.php';

// clears all records that are pending
$res = $conn->query("UPDATE employee_salary SET clearance='cleared' WHERE clearance='pending'");

// redirects to display salary information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=0");
exit;
?>