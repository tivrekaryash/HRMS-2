<?php
// db connection file
include 'db_conn.php';

$emp_id = $_POST['ename'];
$job_start = $_POST['start'];
$desig_id = $_POST['dname'];

// inserting job history
$res = mysqli_query($conn, "INSERT INTO job_history (employee_id, designation_id, job_start_date) values ('$emp_id', '$desig_id', '$job_start')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:history_rec_view.php?c=0");
exit;
?>