<?php
// db connection file
include 'db_conn.php';

// employee id that needs to be deleted
$del_id = $_GET['del'];

// setting all employees' designations under the department to null
$sql = mysqli_query($conn, "UPDATE employee_information SET designation_id=NULL WHERE designation_id='$del_id'");

// deleting designation
$sql = mysqli_query($conn, "delete from designations where designation_id = '$del_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:cmp_struct_view.php");
exit;

?>