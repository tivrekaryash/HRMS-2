<?php
// db connection file
require_once 'db_conn.php';

// fetches leave id to be rejected
$upd_id = $_GET['lacc'];

// rejects the leave
$res = $conn->query("UPDATE leaves SET approval='rejected' WHERE leave_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:time_rec_view.php?c=3");
exit;
?>