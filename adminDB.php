<?php
        include ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/doctorDB.css">
	<link rel="stylesheet" href="./css/buttons.css">
	<link rel="stylesheet" href="./css/modals.css">
    <link rel="stylesheet" href = "./css/verificationButtons.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   

    <title>Document</title>
</head>
<body>
<div class="admin-wrapper">
    <div class="main-container"> 
        <ul class="main-navigation">
            <li>
                <a href="doctorVerificationTable.php">
                   <button class="adminNavigationBtn"> Verify Doctors </button>
                </a>

            </li>
            <li>
                
            <a href="patientsVerificationTable.php">
                <button class="adminNavigationBtn"> Verify Patients </button>
                </a>

            </li>
            <li>
            <a href="accountsMonitoring.php">
                <button class="adminNavigationBtn"> Accounts Monitoring </button>
                </a>

            </li>
      
       </ul>
        <div class="theSidebar">
</div>
</div>  
</div>
<script src="./js/events.js"></script>
<script src="./js/navigationEvents.js"></script>
</body>
</html>

