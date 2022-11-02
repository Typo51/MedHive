<?php
session_start();

if (isset($_POST['logoutAcc'])){
session_destroy();
$response=array('status'=>true);
echo json_encode($response);exit();
}
?>