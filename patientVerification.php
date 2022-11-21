<?php
  include('connect.php');

if(isset($_GET['screen_acct_id']))
  {
    $id = $_GET['screen_acct_id'];
   }



  if (isset($_POST['submit'])) {
     
      $first_name=$_POST['first_name'];
      $last_name=$_POST['last_name'];
      $age=$_POST['age'];
      $gender=$_POST['gender'];
      $email=$_POST['email'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $acc_type='0';
      $status = '0';


    $sql= "Select * From `account` Where first_name= '$first_name' and last_name= '$last_name'";
    $selectresult=mysqli_query($con, $sql);
    $number = mysqli_num_rows($selectresult);

    if ($number>0)
    {
      echo"<script>alert('Name already exist')</script>";
    }
    else
    {
      $sql1 = "insert into `account` (first_name, last_name, gender, email, username, password, status, acc_type) values ( '$first_name', '$last_name', '$gender','$email','$username','$password', '$status', '$acc_type')";
      $result1 = mysqli_query($con, $sql1);
      if($result1)
      {

        $sql2 = "insert into `patient` (last_name, first_name, age) values ( '$last_name', '$first_name', '$age')";
         $result2 = mysqli_query($con, $sql2);

        if ($result2){

         $sql_delete="Delete from `screening` where screen_acct_id=$id";
         $deletation=mysqli_query($con,$sql_delete);

        echo"<script>alert('Verified!')</script>";
        echo "<script>window.open('adminDB.php','_self')</script>";
      }
    }else
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

    <title>Patient Verification</title>
  </head>
  <body>
  <div class="center">


<?php 

  $sql = "Select * from `screening` WHERE screen_acct_id = $id";
  $selectresult=mysqli_query($con, $sql);
while ($row=mysqli_fetch_assoc($selectresult)) 
{
 $surname=$row['last_name'];
 $firstname=$row['first_name']; 
 $age=$row['age']; 
$gender=$row['gender'];
$email=$row['email'];
$address=$row['address'];
$username=$row['username'];
$password=$row['password'];
$specialization=$row['specialization'];
}
 ?>



    <div class="container my-5">
        <div class="header">
          <h3>Patient Verification</h3>
        </div>
      <form method="post" enctype="multipart/form-data">
        <div class="txt_field">
          <input type="text" required="required" name="first_name" <?php echo"value='$firstname'"; ?>>
          <label>First Name</label>
        </div>
        <div class="txt_field">
          <input type="text" required="required" name="last_name" <?php echo"value='$surname'"; ?>>
          <label>Last Name</label>
        </div>
      
        <div class="txt_field">
          <input type="text" required="required" name="email" <?php echo"value='$email'"; ?>>
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="age" <?php echo"value='$age'"; ?>>
          <label>Age</label>
        </div>
        
               <div class="gender">
    <select id="gender" name="gender">
            <option <?php echo"value='$gender'"; ?>><?php echo"$gender"; ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    </select>
    <br>
    <br>
        <div class="txt_field">
          <input type="text" required="required" name="username" <?php echo"value='$username'"; ?>>
          <label>Enter Username</label>
        </div>
          <div class="txt_field">
          <input type="text" required="required" name="password" <?php echo"value='$password'"; ?>>
          <label>Password</label>
        </div>
        


        <!-- IPA MODAL MO NING NA COMMENT JAS HA -->
          <!-- IUNCOMMENT ANG HTML KAG PHP SINI TQ -->


<!--           <div class="txt_field">
          <a onclick="#"> <img <?php /*echo" src='ids/$surname$firstname.jpg'"*/; ?>> </a>
        </div> -->
        
         </div>

      
    
</select>

      <button type="submit" name="submit" >Verify</button>
           
         <br>
         <br>
   <center>  <a href="adminDB.php" class="btn btn-dark" style="text-decoration: none; color: white;">Cancel</a> </center>
     
      </form>
    </div>
    </div>
    </div>
  </body>
</html>
