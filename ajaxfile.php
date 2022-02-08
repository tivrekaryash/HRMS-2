<?php
include 'db_conn.php';

$userid = $_POST['userid'];
$result = mysqli_query($conn, "select * from job_history where employee_id='$userid'");

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'>";

while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $res->fetch_assoc();
    $res = mysqli_query($conn, "select * from designations where designation_id = '$emprow[designation_id]'");
    $desrow = $res->fetch_assoc();

    $response .= "<tr><td>Employee ID : </td><td>" . $emprow['employee_id'] . "</td>";
    $response .= "<td>Employee Name : </td><td>" . $emprow['employee_name'] . "</td>";
    $response .= "<td>Designation : </td><td>" . $desrow['designation'] . "</td>";
    $response .= "<td>Start Date : </td><td>" . $row['job_start_date'] . "</td></tr>";
}
$response .= "</table>";

echo $response;
exit;
?>