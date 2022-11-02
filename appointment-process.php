<?php 
include 'connect.php';

if(isset($_POST['appointmentID'])){
    $appointmentID=$_POST['appointmentID'];
    $sql = "DELETE from `appointment` WHERE `transaction_id` ='$appointmentID'";
    $result=mysqli_query($con,$sql);
    
    $response=array('status'=>true);
    echo json_encode($response);exit();

}

?>