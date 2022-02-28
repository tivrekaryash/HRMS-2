<?php
// db connection file
include 'db_conn.php';

$leavetype = $_POST['leavetype'];

// inserting leave details
$res = mysqli_query($conn, "INSERT INTO leave_types (types) values ('$leavetype')");

// redirects to display leave type information after closing connection
$conn->close();
header("location:time_rec_view.php?c=2");
exit;

?>