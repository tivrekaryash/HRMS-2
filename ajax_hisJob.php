<?php
include 'db_conn.php'; 

$userid = $_POST['userid'];
$result = mysqli_query($conn, "select * from job_history where employee_id='$userid' order by history_id desc");

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'><tr><th>Employee ID</th><th>Employee Name</th><th>Designation</th><th>Start Date</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $res->fetch_assoc();
    $res = mysqli_query($conn, "select * from designations where designation_id = '$row[designation_id]'");
    $desrow = $res->fetch_assoc();

    $response .= "<tr><td>" . $row['employee_id'] . "</td>";
    $response .= "<td>" . $emprow['employee_name'] . "</td>";
    $response .= "<td>" . $desrow['designation'] . "</td>";
    $response .= "<td>" . $row['job_start_date'] . "</td></tr>";
}
$response .= "</table>"; 

echo $response;
exit;
?>