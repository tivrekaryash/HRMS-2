<?php
include 'db_conn.php'; 

$userid = $_POST['userid'];
$result = mysqli_query($conn, "select * from attendance where employee_id='$userid' order by attendance_id desc");

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'><tr><th>Employee ID</th><th>Employee Name</th><th>Clock-in</th><th>Clock-out</th><th>Shift</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $res->fetch_assoc();

    $response .= "<tr><td>" . $row['employee_id'] . "</td>";
    $response .= "<td>" . $emprow['employee_name'] . "</td>";
    $response .= "<td>" . $row['clock_in'] . "</td>";
    $response .= "<td>" . $row['clock_out'] . "</td>";
    $response .= "<td>" . $row['shift'] . "</td></tr>";
}
$response .= "</table>"; 

echo $response;
exit;
?>