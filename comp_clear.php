<?php
// db connection file
include 'db_conn.php';

// fetches the id of the compensation to be cleared
$acc_id = $_GET['acc'];

// clearing compensation
$res = mysqli_query($conn, "update compensation set clearance = 'cleared' where compensation_id = '$acc_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=2");
exit; 

?>