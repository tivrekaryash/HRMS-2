<?php
// db connection file
require_once 'db_conn.php';

// fetches record to be accepted
$leave_id = $_GET['lacc'];

// clears record
$res = $conn->query("UPDATE leaves SET approval='approved' WHERE leave_id='$leave_id'");

// redirects to display salary information after closing connection
$conn->close();
header("location:time_rec_view.php?c=3");
exit;
?>