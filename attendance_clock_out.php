<?php
// db connection file
require_once 'db_conn.php';

$attend_id = $_GET["aid"];

// fetches current date and time
$overtime_date = new DateTime();
date_default_timezone_set('Asia/Calcutta');
$overtime_date = $overtime_date->format('Y-m-d');

// clocks the employee out
$res = $conn->query("UPDATE attendance SET clock_out_val = '1' where attendance_id = '$attend_id'");

// fetches attendance data
$res = $conn->query("select * from attendance where attendance_id = '$attend_id'");
$res = $res->fetch_assoc();

// calculates time difference between clock in and clock out times and rounds it off to the nearest lower integer
$hours = floor(abs(strtotime($res["clock_out"]) - strtotime($res["clock_in"])) / 3600);                                    // to change to upper limit use ceil instead of floor

// calculates number of hours the employee has worked overtime
$hours -= 8;

// checks if the employee has worked overtime
if ($hours > 0) {
    // fetches employee data
    $res = $conn->query("select * from employee_information where employee_id = '$res[employee_id]'");
    $res = $res->fetch_assoc();

    // fetches amount per hour for the employee
    $desig_res = $conn->query("select * from designations where designation_id = '$res[designation_id]'");
    $desig_res = $desig_res->fetch_assoc();

    // calculating amount of overtime pay owed
    $amount = $hours * $desig_res["amt_per_hour"];

    // stores the difference as extra hours worked if any
    $res = $conn->query("insert into overtime_pay_emp (employee_id, otp_date, hrs_worked, total_amt) values ('$res[employee_id]', '$overtime_date', '$hours', '$amount')");
}

// redirects to display candidate information after closing connection
$conn->close();
header("location:time_rec_view.php?c=0");
exit;
