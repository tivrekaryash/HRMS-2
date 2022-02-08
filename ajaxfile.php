<?php
require_once 'db_conn.php';

$userid = $_POST['userid'];
$sql = "select * from job_history where employee_id=" . $userid;
$result = mysqli_query($conn, $sql);

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'>";
while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $res->fetch_assoc();
    $res = mysqli_query($conn, "select * from designations where designation_id = '$row[designation_id]'");
    $desrow = $res->fetch_assoc();

    $employee_id = $emprow['employee_id'];
    $employee_name = $emprow['employee_name'];
    $designation = $desrow['designation'];
    $jobstartdate = $row['job_start_date'];

    $response .= "<tr>";
    $response .= "<td>Employee ID : </td><td>" . $employee_id . "</td>";
    //$response .= "</tr>";

    //$response .= "<tr>";
    $response .= "<td>Employee Name : </td><td>" . $employee_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Designation : </td><td>" . $designation . "</td>";
    //$response .= "</tr>";

    //$response .= "<tr>";
    $response .= "<td>Start Date : </td><td>" . $jobstartdate . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";

echo $response;
exit;
?>
