<?php
// db connection file
require_once 'db_conn.php';

// fetches updated data from the form
$fullname = $_POST['fname_upd'];
$dateofbirth = $_POST['dob_upd'];
$age = $_POST['age_upd'];
$gender = $_POST['gender_upd'];
$address = $_POST['address_upd'];
$email = $_POST['email_upd'];
$phnum_hm = $_POST['phnum_hm'];
$phnum_wk = $_POST['phnum_wk'];
$phnum_mb = $_POST['phnum_mb'];
$upd_id = $_POST['eid'];

// stores updated data into the database
$res = $conn->query("UPDATE employee_information SET employee_name='$fullname', employee_dob='$dateofbirth', employee_age='$age', employee_gender='$gender', employee_address='$address', employee_email='$email' WHERE employee_id='$upd_id'");
$res = $conn->query("UPDATE employee_phnum SET phnum_home='$phnum_hm', phnum_work='$phnum_wk', phnum_mobile='$phnum_mb' WHERE employee_id='$upd_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:emp_details.php");
exit;
?>