<?php
include 'db_conn.php'; 

$userid = $_POST['userid'];
$result = mysqli_query($conn, "select * from overtime_pay_emp where employee_id='$userid' and clearance='pending' order by otp_pay_id desc");

$response = "<table style='text-align:center; background-color:white;' class='table table-bordered table-hover'><tr><th>Employee ID</th><th>Employee Name</th><th>Date</th><th>Hours-Worked</th><th>Amount(Rs.)</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $res = mysqli_query($conn, "select * from employee_information where employee_id = '$row[employee_id]'");
    $emprow = $res->fetch_assoc();

    $response .= "<tr><td>" . $row['employee_id'] . "</td>";
    $response .= "<td>" . $emprow['employee_name'] . "</td>";
    $response .= "<td>" . $row['otp_date'] . "</td>";
    $response .= "<td>" . $row['hrs_worked'] . "</td>";
    $response .= "<td>" . $row['total_amt'] . "</td></tr>";
}
$response .= "</table>"; 

echo $response;
exit;
?>