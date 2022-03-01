<?php
// db connection file
require_once 'db_conn.php';

$attend_id = $_GET["aid"];

// fetches current date and time
$clockout_date = new DateTime();
date_default_timezone_set('Asia/Calcutta');
$clockout_date = $clockout_date->format('Y-m-d H:i:s');

// stores updated data into the database
$res = $conn->query("UPDATE attendance SET clock_out = '$clockout_date' where attendance_id = '$attend_id'");

// fetches attendance data
$res = $conn->query("select * from attendance where attendance_id = '$attend_id'");
$res = $res->fetch_assoc();

// calculates time difference between clock in and clock out times
$hours = 0;

// calculates total amount of overtime pay accumulated on that day
$amount = 0;

// stores the difference as extra hours worked if any
$res = $conn->query("insert into overtime_pay_emp (employee_id, hrs_worked, total_amt) values ('$res[employee_id]', '$hours', '$amount')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:time_rec_view.php?c=0");
exit;
?>