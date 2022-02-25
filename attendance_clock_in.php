<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$upd_id = $_POST['aid'];

// stores updated data into the database
$res = $conn->query("UPDATE attendance SET clock_out");

// redirects to display candidate information after closing connection
$conn->close();
header("location:candidate_details.php");
exit;
?>