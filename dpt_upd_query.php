<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$deptname = $_POST['deptname_upd'];
$deptloc = $_POST['deptloc_upd'];
$upd_id = $_POST['dptid'];

// stores updated data into the database
$res = $conn->query("UPDATE department SET department_name='$deptname', department_location='$deptloc' WHERE department_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:cmp_struct_view.php?c=0");
exit;
?>