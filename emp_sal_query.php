<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$sal_date = $_POST['Sal_date_upd'];
$sal_amt = $_POST['sal_amt_upd'];
$upd_id = $_POST['emp_id'];

// updates employee's salary
$res = $conn->query("UPDATE employee_salary SET salary_amount='$sal_amt' WHERE employee_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:finance_rec_view.php?c=0");
exit;
?>