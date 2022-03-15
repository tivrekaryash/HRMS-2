<?php
session_start();
// db connection file
include 'db_conn.php';
// 
require_once('if_logged_in.php');

// retrieves form data from login_form.html
$uname = $_POST['username'];
$pass = $_POST['password'];

// checking validity of username and password (from db)

/* $res = mysqli_query($conn, "select * from login_details where username = '$uname' and password = '$pass'");
if( $res->num_rows > 0 )
{
    $row = $res->fetch_assoc();
    
    // regenerate session id
    session_regenerate_id();
    $_SESSION['login'] = true;

    // redirect the user to members area/dashboard page
    header("location:index_admin.php");
} */

// checking validity of username and password (hardcoded)
if( $uname == "admin" && $pass == "admin" )
{
    // regenerate session id
    session_regenerate_id();
    $_SESSION['login'] = true;
    $_SESSION['id'] = 1;
    $_SESSION['login_time'] = time();

    // redirect the user to members area/dashboard page
    header("location:index_admin.php");
}
?>