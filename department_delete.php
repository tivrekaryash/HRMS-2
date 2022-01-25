<?php
// db connection file
include 'db_conn.php';

// employee id that needs to be deleted
$del_id = $_GET['del'];

// getting all designations under the department
$del = mysqli_query($conn, "select * from designations where department_id = '$del_id'");

while ($del = $del->fetch_assoc()) {
    // setting all employees' designations under the department to null
    $sql = mysqli_query($conn, "UPDATE employee_information SET designation_id=NULL WHERE designation_id='$del[designation_id]'");

    // deleting all designations under the department
    $sql = mysqli_query($conn, "delete from designations where designation_id = '$del[designation_id]'");
}

// deleting department
$sql = mysqli_query($conn, "delete from department where department_id = '$del_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:emp_details.php");
exit;
