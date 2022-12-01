<?php
  include('connect.php');

if(isset($_GET['screen_acct_id']))
  {
    $id = $_GET['screen_acct_id'];
   }



  if (isset($_POST['submit'])) {
     
      $first_name=htmlspecialchars($_POST['first_name']);
      $last_name=htmlspecialchars($_POST['last_name']);
      $specialization=htmlspecialchars($_POST['specialization']);
      $username=htmlspecialchars($_POST['username']);
      $password=htmlspecialchars($_POST['password']);
      $email=htmlspecialchars($_POST['email']);
      $phone=htmlspecialchars($_POST['contact']);
      $address=htmlspecialchars($_POST['address']);
      $acc_type='1';
      $status = '0';


    $sql= "Select * From `account` Where username= '$username'";
    $selectresult=mysqli_query($con, $sql);
    $number = mysqli_num_rows($selectresult);

    if ($number>0)
    {
      echo"<script>alert('Name already exist')</script>";
    }
    else
    {
      $sql1 = "insert into `account` (`last_name`,`first_name`, `username`, `password`, `email`,`type`) values ('$last_name', '$first_name', '$username', '$password', '$email','$acc_type')";
      $result1 = mysqli_query($con, $sql1);
      if($result1)
      {

        $sql2 = "INSERT INTO `doctor`(`specialization`) VALUES ('$specialization')";
         $result2 = mysqli_query($con, $sql2);

        if($result2){  

        $sql3 = "INSERT INTO `clinic_info`(`clinic_address`, `contact_info`) VALUES ('$address', '$phone')";
         $result3 = mysqli_query($con, $sql3);

          if($result3) {
          
         $sql_delete="Delete from `screening` where screening_id=$id";
         $deletation=mysqli_query($con,$sql_delete);

        echo"<script>alert('Verified!')</script>";
        echo "<script>window.open('adminDB.php','_self')</script>";
        }
      }
    }
    else{
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


    <?php 

      $sql = "Select * from `screening` WHERE screening_id = $id";
      $selectresult=mysqli_query($con, $sql);
      while ($row=mysqli_fetch_assoc($selectresult)) 
      {
         $last_name=$row['last_name'];
         $first_name=$row['first_name']; 
        $specialization=$row['specialization'];
        $username=$row['username'];
        $password=$row['password'];
        $email=$row['email'];
        $address=$row['address'];
        $contact=$row['contact'];
        $prc = $row['id'];
      }







     ?>



  <div class="center">

    <div class="container my-5">
        <div class="header">
          <h3>Doctor Registration</h3>
        </div>
      <form method="post" enctype="multipart/form-data">
        <div class="txt_field">
          <input type="text" required="required" name="first_name" value="<?php echo $first_name ?>">
          <label>First Name</label>
        </div>
        <div class="txt_field">
          <input type="text" required="required" name="last_name" value="<?php echo $last_name ?>">
          <label>Last Name</label>
        </div>

        <div class="gender">
          <select id="specialization" name="specialization" >
            <option value="<?php echo $specialization ?>"><?php echo $specialization ?></option>
          </select>
        </div>

        <div class="txt_field" >
        <input type="text" required="required" name="username" value="<?php echo $username ?>">
        <label>Enter Username</label>
      </div>

        <div class="txt_field" >
            <input type="text" required="required" name="password" value="<?php echo$password ?>">
            <label>Password</label>
          </div>

        <div class="txt_field">
          <input type="text" required="required" name="email" value="<?php echo $email ?>">
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="address" value="<?php echo $address ?>">
          <label>Clinic Address</label>
        </div>
        
        <div class="txt_field" >
          <input type="text" name="contact" value="<?php echo $contact ?>">
          <label>Clinic Contact Number</label>
        </div>

       

          <label style="color: gray;">PRC</label>
          <div class="txt_field">
          <img src=' <?php echo "./ids/".$prc.""?>'>
        </div>
        
         </div>

    

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
