<?php
// db connection file
include 'db_conn.php';

$designation = $_POST['desgname'];
$job_start = $_POST['start'];
$job_end = $_POST['end'];
$job_desc = $_POST['jobdesc'];
$emp_id = $_POST['eid'];

// fetching designation id based on designation selected
$res_desg = mysqli_query($conn, "select designation_id from designations where designation = '$designation'");
$res_desg = $res_desg->fetch_assoc();

// inserting job history
$res = mysqli_query($conn, "INSERT INTO job_history (employee_id, designation_id, job_start_date, job_end_date, job_description) values ('$emp_id', '$row[designation_id]', '$job_start', '$job_end', '$job_desc')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:history_rec_view.php");
exit;
?>