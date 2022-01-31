<?php
// db connection file
include 'db_conn.php';

$emp_id = $_POST['empname'];
$date = $_POST['date'];
$beh_std = $_POST['best'];
$dis_action = $_POST['disc'];

// inserting job history
$res = mysqli_query($conn, "INSERT INTO disciplinary_history (employee_id, behaviour_standard, disciplinary_action, dis_date) values ('$emp_id', '$beh_std', '$dis_action', '$date')");

// redirects to display candidate information after closing connection
//$conn->close();
//header("location:history_rec_view.php?c=1");
//exit;
?>