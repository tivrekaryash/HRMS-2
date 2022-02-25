<?php
// db connection file
require_once 'db_conn.php';

$attend_id = $_GET["aid"];

// fetches current date and time
$sal_date = new DateTime();
date_default_timezone_set('Asia/Calcutta');
$sal_date = $sal_date->format('Y-m-d H:i:s');

// stores updated data into the database
$res = $conn->query("UPDATE attendance SET clock_out = '$sal_date' where attendance_id = '$attend_id'");

// redirects to display candidate information after closing connection
$conn->close();
header("location:time_rec_view.php?c=0");
exit;
?>