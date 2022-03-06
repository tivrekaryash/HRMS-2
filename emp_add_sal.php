<?php
// db connection file
include 'db_conn.php';

// fetches current date
$sal_date = new DateTime();
$sal_date = $sal_date->format('Y-m-d');

// 
$result = mysqli_query($conn, "select * from employee_information where designation_id is not null");

while ($row = $result->fetch_assoc()) {
    // fetching base salary
    $res = mysqli_query($conn, "select salary_amount_rec from emp_personal_sal where employee_id = '$row[employee_id]'");
    $res = $res->fetch_assoc();

    // inserting employee salary
    $res = mysqli_query($conn, "INSERT INTO employee_salary (employee_id, salary_amount, salary_date) values ($row[employee_id], $res[salary_amount_rec], '$sal_date')");
}

// redirects to display candidate information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=0");
exit;
?>