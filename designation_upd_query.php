<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$desig = $_POST['desgname_upd'];
$salary = $_POST['basesal_upd'];
$amt_per_hour = $_POST['otp_amt_upd'];
$upd_id = $_POST['desgid'];

// stores updated data into the database
$res = $conn->query("UPDATE designations SET designation='$desig', base_salary='$salary', amt_per_hour='$amt_per_hour' WHERE designation_id='$upd_id'");

if ($res) {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:cmp_struct_view.php?c=1");
    exit;
} else {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:cmp_struct_view.php?c=1&e=1");
    exit;
}
?>