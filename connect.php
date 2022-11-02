<?php

$con = new mysqli('localhost', 'kernelpaulo', 'admin12345', 'clinic');

if (!$con){
die(mysql_error($con));

}
?>