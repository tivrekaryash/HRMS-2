<?php
// db connection file
include 'db_conn.php';

$department = $_POST['deptname'];
$desig = $_POST['desgname'];
$salary = $_POST['basesal'];
$amt_per_hour = $_POST['otp_amt'];

// inserting department
$res = mysqli_query($conn, "INSERT INTO designations (department_id, designation, base_salary, amt_per_hour) values ('$department', '$desig', '$salary', '$amt_per_hour')");

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