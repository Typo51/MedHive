<?php
  include('connect.php');

if(isset($_GET['screen_acct_id']))
  {
    $id = $_GET['screen_acct_id'];
   }



  if (isset($_POST['submit'])) {
     
      $first_name= htmlspecialchars($_POST['first_name']) ;
      $last_name=htmlspecialchars($_POST['last_name']) ;
      $gender=htmlspecialchars($_POST['gender']);
      $birth=htmlspecialchars($_POST['birth']) ;
      $height=htmlspecialchars($_POST['height']);
      $weight=htmlspecialchars($_POST['weight']);
      $address=htmlspecialchars($_POST['address']);
      $username=htmlspecialchars($_POST['username']) ;
      $password=htmlspecialchars($_POST['password']) ;
      $email=htmlspecialchars($_POST['email']) ;
      $phone=htmlspecialchars($_POST['phone']) ;
      $acc_type='0';


    $sql= "Select * From `account` Where username= '$username'";
    $selectresult=mysqli_query($con, $sql);
    $number = mysqli_num_rows($selectresult);

    if ($number>0)
    {
      echo"<script>alert('Name already exist')</script>";
    }
    else
    {
      $sql1 = "insert into `account` (`last_name`, `first_name`, `username`, `password`, `email`,`type`) values ('$last_name', '$first_name', '$username', '$password', '$email', '$acc_type')";
      $result1 = mysqli_query($con, $sql1);
      if($result1)
      {

        $sql2 = "insert into `patient` ( `birthday`, `address`, `contact_num`, `height`, `weight`, `sex`) values ('$birth', '$address','$phone', '$height', '$weight', '$gender')";
         $result2 = mysqli_query($con, $sql2);

        if ($result2){

         $sql_delete="Delete from `screening` where screening_id=$id";
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

    <title>Patient Signup</title>
  </head>
  <body>

    <?php 

  $sql = "Select * from `screening` WHERE screening_id = $id";
  $selectresult=mysqli_query($con, $sql);
while ($row=mysqli_fetch_assoc($selectresult)) 
{
 $last_name=$row['last_name'];
 $first_name=$row['first_name'];
$gender=$row['sex'];
$birth=$row['birthday'];
$height=$row['height'];
$weight=$row['weight'];
$address=$row['address'];
$username=$row['username'];
$password=$row['password'];
$email=$row['email'];
$phone=$row['contact'];
$idCard=$row['id'];

}
 ?>


  <div class="center">

    <div class="container my-5">
        <div class="header">
          <h3>Patient Registration</h3>
        </div>
      <form method="post" enctype="multipart/form-data">
        <div class="txt_field">
          
          <input type="text" required="required" name="first_name" value="<?php echo $first_name; ?>">
          <label>First Name</label>
        </div>
        <div class="txt_field">
          <input type="text" required="required" name="last_name" value="<?php echo $last_name; ?>">
          <label>Last Name</label>
        </div>

          <div class="gender">
            <select id="gender" name="gender">
                    <option value="<?php echo $gender; ?>"><?php echo $gender ?></option>
            </select>
          </div>

        <br>
        <label>Date of Birth</label>
        <div class="txt_field">
          <input type="date" required="required" name="birth" value="<?php echo $birth; ?>">
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="height" value="<?php echo $height; ?>">
          <label>Height (cm)</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="weight" value="<?php echo $weight; ?>">
          <label>Weight (kg)</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="address" value="<?php echo $address; ?>">
          <label>Full Address</label>
        </div>

        
        <div class="txt_field">
          <input type="text" required="required" name="username" value="<?php echo $username; ?>">
          <label>Enter Username</label>
        </div>
  
        <div class="txt_field">
          <input type="password" required="required" name="password" value="<?php echo $password; ?>">
          <label>Password</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="email" value="<?php echo $email; ?>">
          <label>Email</label>
        </div>

        <div class="txt_field">
          <input type="text" required="required" name="phone" value="<?php echo $phone; ?>">
          <label>Phone Number</label>
        </div>

          <label style="color: gray;">Upload your PRC</label>
          <div class="txt_field">
         <img src=' <?php echo "./ids/".$idCard.""?>'>
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
