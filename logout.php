<?php
session_start();
session_destroy();
header("location:login_form.html?lerr=0");
?>