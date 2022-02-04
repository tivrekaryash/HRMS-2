<?php
// db connection file
include 'db_conn.php';

// fetches updated data from the form
$emp_id = $_POST['empname'];
$desig_id = $_POST['design'];

// stores updated data into the database
$res = $conn->query("UPDATE employee_information SET designation_id='$desig_id' WHERE employee_id='$emp_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:emp_details.php?c=3");
exit;
?>