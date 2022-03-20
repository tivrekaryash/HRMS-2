<?php
// db connection file
include 'db_conn.php';

$type_id = $_POST['leavetype'];
$emp_id = $_POST['leave_emp'];
$start_date = $_POST['leave_sdate'];
$end_date = $_POST['leave_edate'];
$reason = $_POST['reason'];

// inserting leave
$res = mysqli_query($conn, "INSERT INTO leaves (employee_id, type_id, leave_start_date, leave_end_date, reason) values ('$emp_id', '$type_id', '$start_date', '$end_date', '$reason')");

if ($end_date > $start_date) {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:time_rec_view.php?c=3");
    exit;
} else {
    // redirects to display candidate information after closing connection
    $conn->close();
    header("location:time_rec_view.php?c=3&e=1");
    exit;
}
?>