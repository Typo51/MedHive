<?php 

include('connect.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail-> SMTPAuth = true;
    $mail->Username = 'medhivedoctors@gmail.com';
    $mail->Password = 'tcdakkwsjmasubfp';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('medhivedoctors@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();
    $acct_id=$_POST['acct_id'];
    $date_id=$_POST['date_id'];

    echo " <script>
     alert('Sent Sucessfully');
     document.location.href ='doctorViewToPatient.php?acct_id=$acct_id&&date_id=$date_id';
    </script> ";

}

?>
