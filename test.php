
<!-- This pasge is used for testing purpose only-->
<?php

$uname='admin';
$password = password_hash($uname, PASSWORD_DEFAULT);

echo $password;

?>