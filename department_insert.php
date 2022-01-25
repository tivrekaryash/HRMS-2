<?php
// db connection file
include 'db_conn.php';

$deptname = $_POST['deptname'];
$deptloc = $_POST['deptloc'];

// inserting department
$res = mysqli_query($conn, "INSERT INTO department (department_name, department_location) values ('$deptname', '$deptloc')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:cmp_struct_view.php");
exit;
?>