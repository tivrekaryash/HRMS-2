<?php
session_start();
if(isset($_SESSION['login']) & ($_SESSION['login'] == true)){
	if(time()-$_SESSION["login_time"] >600)
    {
        session_unset();
        session_destroy();
        header("location:login_form.html");
    }
}else{
	// redirect user to login page
	header("location:login_form.html");
}
if(isset($_SESSION['id']) & !empty($_SESSION['id'])){

}else{
	// redirect user to login page
	header("location:login_form.html");
}
?>