<?php 

    include ('connect.php');
  include ('side.php');
  $user_id = $_SESSION['user_id'];
  
    if(isset($_SESSION['user_id']))
    {
        $select_query="Select * from `account` WHERE acct_id = $user_id";
        $result=mysqli_query($con,$select_query);

       while ($row=mysqli_fetch_assoc($result)) 
           {

            $id=$row['acct_id'];
            $firstname=$row['first_name'];
         }

    }

    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birthday = $_POST['birthday'];
        $religion = $_POST['religion'];
        $about = $_POST['about'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $heart_rate = $_POST['heart_rate'];
        $bp = $_POST['bp'];


        $update_query = "UPDATE `vital_signs` SET `height`='$height',`weight`='$weight',`heart_rate`='$heart_rate',`blood_pressure`='$bp' WHERE vit_pat_id = $user_id";

        $result = mysqli_query($con, $update_query);

        if ($result) {
            echo "<script> alert ('Updated!') </script>";
        }
    
    }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/patientsInfoForm.css">

    <title>Patients Information Form</title>
</head>
<body>

    <div class="containerFluid">
        <div class="header"> <h1> Patients Information Form</h1>  </div> 
            <form method="POST">
            
            <div class="wrapper">

            <div class="infoContainer">

                <div class="infoEntries">
                    <div class="firstInputs">
                        <div class="inputGroup">
                        <h2>First Name</h2>
                        <input class="names" type="text" placeholder=" First Name" name="first_name">
                        </div>
                        <div class="inputGroup">
                        <h2>Last Name</h2>
                        <input class="names" type="text" placeholder=" Last Name" name="last_name">
                        </div>
                        <div class="inputGroup">
                        <h2>Birth Date</h2>
                        <input class="datePicker" type="date" name="birthday">
                        </div>
                        <div class="inputGroup">
                        <h2>Religion</h2>
                        <input class="religion" type="text" placeholder="Religion" name="religion">
                        </div>
                    </div>
                     <h2>About Me</h2>
                    <div class="aboutMe">
                        <textarea class="about" name="" id=""  placeholder=" Write Something About you" name="about"></textarea>
                    </div>
                    <div class="vitals">
                        <input class="vita"type="text" placeholder=" Height" name="height">
                        <input class="vita" type="text" placeholder=" Weight" name="weight"> 
                        <input class="vita" type="text" placeholder=" Heart Rate" name="heart_rate">
                        <input class="vita" type="text" placeholder=" Blood Pressure" name="bp">
                    </div>
                </div>
                    <input id="submit" type="submit" name="submit">
            </div>
            </div>
        </form>
        </div>
    </div>    
</body>
</html>