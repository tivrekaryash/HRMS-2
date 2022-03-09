<?php
// db connection file
include 'db_conn.php';

// fetches updated data from the form
$sal_id = $_POST['psal_id'];
$sal_amt = $_POST['emp_psal_upd'];

// stores updated data into the database
$res = $conn->query("UPDATE emp_personal_sal SET salary_amount_rec='$sal_amt' WHERE personal_sal_id='$sal_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:emp_details.php?c=4");
exit;
?>