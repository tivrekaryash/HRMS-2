<?php
// db connection file
include 'db_conn.php';

// leave type id that needs to be deleted
$del_id = $_GET['lid'];

// deleting leaves
$sql = mysqli_query($conn, "delete from leaves where type_id = '$del_id'");

// deleting leave type
$sql = mysqli_query($conn, "delete from leave_types where type_id = '$del_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:time_rec_view.php?c=2");
exit;

?>