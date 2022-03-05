<?php
include 'db_conn.php'; 

$userid = $_POST['userid'];
$result = mysqli_query($conn, "select * from compensation where employee_id='$userid' and clearance='cleared' order by compensation_id desc");

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'><tr><th>Employee ID</th><th>Employee Name</th><th>Type</th><th>Description</th><th>Amount(Rs.)</th><th>Date</th><th>Clearance</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $res->fetch_assoc();

    $response .= "<tr><td>" . $row['employee_id'] . "</td>";
    $response .= "<td>" . $emprow['employee_name'] . "</td>";
    $response .= "<td>" . $row['compensation_type'] . "</td>";
    $response .= "<td>" . $row['compensation_description'] . "</td>";
    $response .= "<td>" . $row['compensation_amt'] . "</td>";
    $response .= "<td>" . $row['cmp_Date'] . "</td>";
    $response .= "<td>" . $row['clearance'] . "</td></tr>";
}
$response .= "</table>"; 

echo $response;
exit;
?>