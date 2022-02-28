<?php
include 'db_conn.php'; 

$userid = $_POST['userid'];
$result = mysqli_query($conn, "select * from leaves where employee_id='$userid' AND approval='approved' order by leave_start_date desc");

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'><tr><th>Employee ID</th><th>Employee Name</th><th>Leave Type</th><th>Start Date</th><th>End Date</th><th>Reason</th><th>Approval</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $emprow = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $emprow->fetch_assoc();
    $type_row = mysqli_query($conn, "select * from leave_types where type_id = '$row[type_id]'");
    $type_row = $type_row->fetch_assoc();

    $response .= "<tr><td>" . $row['employee_id'] . "</td>";
    $response .= "<td>" . $emprow['employee_name'] . "</td>";
    $response .= "<td>" . $type_row['types'] . "</td>";
    $response .= "<td>" . $row['leave_start_date'] . "</td>";
    $response .= "<td>" . $row['leave_end_date'] . "</td>";
    $response .= "<td>" . $row['reason'] . "</td>";
    $response .= "<td>" . $row['approval'] . "</td></tr>";
}
$response .= "</table>"; 

echo $response;
exit;
?>