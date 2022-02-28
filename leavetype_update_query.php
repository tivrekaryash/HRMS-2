<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$leavetype = $_POST['leavetype_upd'];
$upd_id = $_POST['lt_id'];

// stores updated data into the database
$res = $conn->query("UPDATE leave_types SET types='$leavetype' WHERE type_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:time_rec_view.php?c=2");
exit;
?>