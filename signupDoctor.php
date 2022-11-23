<?php
  include('connect.php');

  if (isset($_POST['submit'])) {
     
      $first_name=htmlspecialchars($_POST['first_name']);
      $last_name=htmlspecialchars($_POST['last_name']);
      $gender=htmlspecialchars($_POST['gender']);
      $email=htmlspecialchars($_POST['email']);
      $address=htmlspecialchars($_POST['address']);
      $username=htmlspecialchars($_POST['username']);
      $password=htmlspecialchars($_POST['password']);
      $specialization=htmlspecialchars($_POST['specialization']);
      $acc_type='1';
      $status = '0';
      $image = $_FILES['image']['name'];
      $target = "ids/".basename($image);


    $sql= "Select * From `screening` Where first_name= '$first_name' and last_name= '$last_name'";
    $selectresult=mysqli_query($con, $sql);
    $number = mysqli_num_rows($selectresult);

    if ($number>0)
    {
      echo"<script>alert('Name already exist')</script>";
    }
    else
    {
      $sql = "insert into `screening` (first_name, last_name, gender, email, address, specialization, username, password, status, acc_type, pic_img) values ( '$first_name', '$last_name', '$gender','$email', ' $address','$specialization','$username','$password', '$status', '$acc_type', '$image')";
      $result = mysqli_query($con, $sql);
      if($result)
      {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "<script>alert('Upload Successful')</script>";
        echo "<script> window.open('login.php', '_self')</script>";
      }
    }
      else
      {
        die (mysqli_error($con));
      }
    }
  }

?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/signupstyle.css">
    <link rel ="stylesheet" href = "./css/buttons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Doctor Signup</title>
  </head>
  <body>
  <div class="center">

    <div class="container my-5">
        <div class="header">
          <h3>Doctor Registration</h3>
        </div>
      <form method="post" enctype="multipart/form-data">
        <div class="txt_field">
          <input type="text" required="required" name="first_name">
          <label>First Name</label>
        </div>
        <div class="txt_field">
          <input type="text" required="required" name="last_name">
          <label>Last Name</label>
        </div>
      
        <div class="txt_field">
          <input type="text" required="required" name="email">
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="address">
          <label>Clinic Address</label>
        </div>
        
               <div class="gender">
    <select id="gender" name="gender">
            <option value="genderr">-Select Gender-</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    </select>
    <br>
    <br>

    <div class="gender">
    <select id="specialization" name="specialization">
            <option value=" ">-Specialization-</option>
            <option value="Psychiatrist">Psychiatrist</option>
            <option value="Orthopedic surgeon ">Orthopedic surgeon </option>
            <option value="Obstetrician & gynecologist">Obstetrician and gynecologist</option>
            <option value="Neurologist">Neurologist</option>
            <option value="Radiologist">Radiologist</option>
            <option value="Pediatrician">Pediatrician</option>
            <option value="Cardiologist">Cardiologist</option>
            <option value="Family physician">Family physicians</option>
            <option value="General internal medicine physician">General internal medicine physician</option></select>
</div>

        <div class="txt_field">
          <input type="text" required="required" name="username">
          <label>Enter Username</label>
        </div>
          <div class="txt_field">
          <input type="password" required="required" name="password">
          <label>Password</label>
        </div>
        
          <div class="txt_field">
          <input type="file" required="required" class="form-control" name="image">
        </div>
        
         </div>

      
    
</select>

      <button type="submit" name="submit" >Submit</button>
           
         <br>
         <br>
   <center>  <a href="login.php" class="btn btn-dark" style="text-decoration: none; color: white;">Cancel</a> </center>
     
      </form>

    </div>
    </div>
    </div>
  </body>
</html>
