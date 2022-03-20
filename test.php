<!-- This pasge is used for testing purpose only-->
<?php

$from = new DateTime('2001-05-23');
$to   = new DateTime('today');
echo $from->diff($to)->y;

?>