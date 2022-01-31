<?php
// db connection file
include 'db_conn.php';

$department = $_POST['deptname'];
$desig = $_POST['desgname'];
$salary = $_POST['basesal'];

// inserting department
$res = mysqli_query($conn, "INSERT INTO designations (department_id, designation, base_salary) values ((select department_id from department where department_name = '$department'), '$desig', '$salary')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:cmp_struct_view.php?c=1");
exit;
?>