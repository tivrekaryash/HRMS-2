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

// calculates time difference between clock in and clock out times and rounds it off to the nearest lower integer
$hours = floor(abs(strtotime($res["clock_out"]) - strtotime($res["clock_in"]))/3600);                                    // to change to upper limit use ceil instead of floor

// fetches employee data
$res = $conn->query("select * from employee_information where employee_id = '$res[employee_id]'");
$res = $res->fetch_assoc();

// fetches amount per hour for the employee
$desig_res = $conn->query("select * from designations where designation_id = '$res[designation_id]'");
$desig_res = $desig_res->fetch_assoc();

// calculates amount of overtime pay accumulated for the shift
$hours -= 8;
$amount = $hours * $desig_res["amt_per_hour"];

// stores the difference as extra hours worked if any
$res = $conn->query("insert into overtime_pay_emp (employee_id, otp_date, hrs_worked, total_amt) values ('$res[employee_id]', '$clockout_date', '$hours', '$amount')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:time_rec_view.php?c=0");
exit;
?>