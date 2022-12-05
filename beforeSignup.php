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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
 <script src="https://kit.fontawesome.com/72732a2f41.js" crossorigin="anonymous"></script>
 

    <title>Doctor Signup</title>
  </head>
  <body>
 

    <div class="container">
      <div class="head">
      <h3>Are you a</h3>
      </div>
      <div class="wrapper">
      
        <div class="box1" >
          <i class="fa-solid fa-user-doctor"></i>
       <a href="signupDoctor.php" style="text-decoration: none; color: black">Doctor</a>
        </div>

        <div class="box2">
          <i class="fa-solid fa-user"></i>
          <a href="signupPatient.php" style="text-decoration: none; color: black">Patient</a>
        </div> </div>
      
        <div class="button-container">
        <a class="button"  href="login.php">Cancel</a>
        </div>
   
    </div>
  </body>
</html>
