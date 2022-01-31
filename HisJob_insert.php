<?php
// db connection file
include 'db_conn.php';

$emp_id = $_POST['ename'];
$desig_id = $_POST['dname'];
$job_start = $_POST['start'];
$job_end = $_POST['end'];
$job_desc = $_POST['jobdesc'];

// inserting job history
$res = mysqli_query($conn, "INSERT INTO job_history (employee_id, designation_id, job_start_date, job_end_date, job_description) values ('$emp_id', '$desig_id, '$job_start', '$job_end', '$job_desc')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:history_rec_view.php?c=0");
exit;
?>