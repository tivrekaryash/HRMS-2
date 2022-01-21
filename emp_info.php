<?php
// db connection file
include 'db_conn.php';

// fetches the id of the accepted candidate
$acc_id = $_GET['acc'];

// Fetching candidate details
$res= $conn->query("SELECT * FROM candidate_information WHERE candidate_id='$acc_id'");
$updData=$res->fetch_assoc();

$fullname = $updData['candidate_fullname'];
$dateofbirth = $updData['candidate_dob'];
$age = $updData['candidate_age'];
$gender = $updData['candidate_gender'];
$address = $updData['candidate_address'];
$phnumber = $updData['phnum'];
$email = $updData['candidate_email'];

// inserting candidate details into employee
$res = mysqli_query($conn, "INSERT INTO employee_information (employee_name, employee_dob, employee_age, employee_gender, employee_address, employee_email) values ('$fullname', '$dateofbirth','$age','$gender','$address', '$email')");

// inserting candidate phone number to employee work phone number
$res = mysqli_query($conn, "insert into employee_phnum (employee_id, phnum_work) values ((select employee_id from employee_information order by employee_id desc limit 1), '$phnumber')");

// Fetching candidate qualifications
$result= $conn->query("SELECT * FROM candidate_qualifications WHERE candidate_id = '$acc_id'");

// runs for as many qualifications there are for the candidate
while($row = $result->fetch_assoc())
{
    // inserting each qualification to employee qualifications
    $res = mysqli_query($conn, "insert into employee_qualifications (employee_id, qualifications_file_location) values ((select employee_id from employee_information order by employee_id desc limit 1), '$row[qualifications_file_location]')");
}

// candidate has been accepted
$res = mysqli_query($conn, "update candidate_information set employee_id = (select employee_id from employee_information order by employee_id desc limit 1) where candidate_id = $acc_id");

// redirects to display employee information after closing connection
$conn->close();
header("location:candidate_details.php");
exit; 

?>