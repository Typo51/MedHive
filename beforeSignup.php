<?php
  include('connect.php');

?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel ="stylesheet" href = "./css/buttons.css">
    <link rel="stylesheet" type="text/css" href="css/beforeSignup.css">

 <script src="https://kit.fontawesome.com/72732a2f41.js" crossorigin="anonymous"></script>
 

    <title>Doctor Signup</title>
  </head>
  <body>
 

    <div class="container my-5">
      <h3 style="padding-left: 11vw;">Are you a</h3>

      <div class="wrapper">
        <div class="box1" >
          <i class="fa-solid fa-user-doctor"></i>
          <a href="signupDoctor.php" style="text-decoration: none; color: black">Doctor</a>
        </div>

        <div class="box2">
          <i class="fa-solid fa-user"></i>
          <a href="signupPatient.php" style="text-decoration: none; color: black">Patient</a>
        </div>
        </div>
        <div class="button-container">
        <a class="button" href="login.php">Cancel</a>
        </div>
    </div>

  </body>
</html>
