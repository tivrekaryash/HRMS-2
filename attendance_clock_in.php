<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$emp_id = $_POST["att_emp"];

// stores updated data into the database
$res = $conn->query("insert into attendance (employee_id) values ('$emp_id')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:time_rec_view.php?c=0");
exit;
?>