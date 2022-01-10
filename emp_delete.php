<?php
// db connection file
include 'db_conn.php';

// employee id that needs to be deleted
$del_id = $_GET['del'];

//-----------------------------------------------------qualification-----------------------------------------------------------//

// getting no. of qualification records to be deleted
$sql = "SELECT * FROM employee_qualifications where employee_id = '$del_id'";
$result = $conn->query($sql);

// deleting qualification records
while( $row = $result->fetch_assoc() )
{
    $sql = mysqli_query($conn,"delete from employee_qualifications where employee_id = '$del_id'");
}

//----------------------------------------------------disciplinary-------------------------------------------------------------//

// getting no. of disciplinary history records to be deleted
$sql = "SELECT * FROM disciplinary_history where employee_id = '$del_id'";
$result = $conn->query($sql);

// deleting disciplinary history records
//while( $row = $result->fetch_assoc() )
{
    $sql = mysqli_query($conn,"delete from disciplinary_history where employee_id = '$del_id'");
}

//---------------------------------------------------------job-----------------------------------------------------------------//

// getting no. of job history records to be deleted
$sql = "SELECT * FROM job_history where employee_id = '$del_id'";
$result = $conn->query($sql);

// deleting job history records
//while( $row = $result->fetch_assoc() )
{
    $sql = mysqli_query($conn,"delete from job_history where employee_id = '$del_id'");
}

//---------------------------------------------------------salary--------------------------------------------------------------//

// getting no. of salary history records to be deleted
$sql = "SELECT * FROM base_salary_history where employee_id = '$del_id'";
$result = $conn->query($sql);

// deleting salary history records
//while( $row = $result->fetch_assoc() )
{
    $sql = mysqli_query($conn,"delete from base_salary_history where employee_id = '$del_id'");
}

//---------------------------------------------------phone number--------------------------------------------------------------//

// deleting employees contact details
$sql = mysqli_query($conn,"delete from employee_phnum where employee_id = '$del_id'");

//----------------------------------------------------main record--------------------------------------------------------------//

// candidate can now be re-accepted
$res = mysqli_query($conn, "update candidate_information set employee_id = NULL where employee_id = '$del_id'");

// deleting main record
$sql = mysqli_query($conn,"delete from employee_information where employee_id = '$del_id'");

// redirects to display employee information after closing connection
$conn->close();
header("location:emp_details.php");
exit;

?>