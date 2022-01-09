<?php
// db connection file
include 'db_conn.php';

// candidate id that needs to be deleted
$del_id = $_GET['del'];

// getting no. of qualification records to be deleted
$sql = "SELECT * FROM candidate_qualifications where candidate_id = '$del_id'";
$result = $conn->query($sql);

// deleting qualification records
while($row = $result->fetch_assoc())
{
    $del = mysqli_query($conn,"delete from candidate_qualifications where candidate_id = '$del_id'");
}

// deleting main record
$del = mysqli_query($conn,"delete from candidate_information where candidate_id = '$del_id'");

// redirects to display employee information
header("location:candidate_details.php");
exit;

?>