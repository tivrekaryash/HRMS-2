<?php
// db connection file
include 'db_conn.php';

// fetches updated data from the form
$desig_id = $_POST['desig_upd'];
$emp_id = $_POST['emp_id'];

// stores updated data into the database
$res = $conn->query("UPDATE employee_information SET designation_id='$desig_id' WHERE employee_id='$emp_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:emp_details.php");
exit;
?>