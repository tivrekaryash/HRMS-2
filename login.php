<?php

// db connection file
include 'db_conn.php';

// retrieves form data from login_form.html
$uname = $_POST['username'];
$pass = $_POST['password'];

// checking validity of username and password
$res = mysqli_query($conn, "select * from login_details where username = '$uname' and password = '$pass'");
if( $res->num_rows > 0 )
{
    $row = $res->fetch_assoc();
    
    // creating session for user id
    session_start();
    $_SESSION["uid"] = $row["user_id"];
    
    // redirects to correct dashboard based on login role
    if( $row["login_role"] == "HR" )
    {
        // redirects to admin dashboard and closes connection
        header("location:index.php");
        $conn->close();
        exit;
    }

    else
    {
        // redirects to user dashboard and closes connection
        header("location:index_user.php");
        $conn->close();
        exit;
    }
}

// redirects to login page after closing connection if username or password doesn't exist
$conn->close();
header("location:login_form.html");
exit;

?>