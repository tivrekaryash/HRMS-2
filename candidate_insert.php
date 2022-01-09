<?php
// db connection file
include 'db_conn.php';

$fullname = $_POST['fullname'];
$dateofbirth = $_POST['dateofbirth'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phnumber = $_POST['phnumber'];
$email = $_POST['email'];
$workexperience = $_POST['workexperience'];
$qualifications = $_POST['qualifications'];

// inserting candidate details
$res = mysqli_query($conn, "INSERT INTO candidate_information (candidate_fullname, candidate_dob, candidate_age, candidate_gender, candidate_address, phnum, candidate_email) values ('$fullname', '$dateofbirth','$age','$gender','$address', '$phnumber', '$email')");

// inserting qualifications of candidate
$res = mysqli_query($conn, "INSERT INTO candidate_qualifications (candidate_id, experience_in_years, qualifications_file_location) values ((select candidate_id from candidate_information order by candidate_id desc limit 1),'$workexperience', '$qualifications')");

// redirects to display candidate information after closing connection
$conn->close();
header("location:candidate_details.php");
exit;

?>