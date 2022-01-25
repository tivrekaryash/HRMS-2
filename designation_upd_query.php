<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$desig = $_POST['desgname_upd'];
$salary = $_POST['basesal_upd'];
$upd_id = $_POST['dptid'];

// stores updated data into the database
$res = $conn->query("UPDATE designations SET designation='$desig', base_salary='$salary' WHERE department_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:cmp_struct_view.php");
exit;
?>