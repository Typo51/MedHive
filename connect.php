<?php 


$server = "localhost";
$user = "kernelpaulo";
$pass = "admin12345";
$database = "clinic";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}

?>