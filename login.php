<?php 

include 'connect.php';

session_start();

error_reporting(0);

if (isset($_SESSION[''])) {
    header("Location:doctorDB.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
   
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
        
		header("Location: doctorDB.php");
        if ($row['acc_type'] == 1){
            $_SESSION['user'] = $row['first_name'];
            $_SESSION['user_id'] = $row['acct_id'];
            $_SESSION['acc_type'] = $row['acc_type'];
            
            $_SESSION['activedoctor'] = true;
            header ("Location: doctorDB.php");
        }
        else {
            $_SESSION['user_id'] = $row['acct_id'];
            $_SESSION['user'] = $row['first_name'];
            $_SESSION['acc_type'] = $row['acc_type'];
            
            $_SESSION['activeuser'] = true;
            header("Location: patientsdb.php");
        }
	} 
   else {
            echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
        }
    }


?>






<html>
     <head>
        <meta charset ="utf-8">
        <title> MedHive Login </title>
        <link rel ="stylesheet" href="css/style.css"> 
</head>

<body> 
   
    <img class="logo" src="images/medhive.png">
    
    <div class="center">
    <h1>Login</h1>
           <form method="post">
 


        <div class="txt_field">
            <input type="text" required="required" name="username">
            <label>Username</label>
            </div>
            <div class="txt_field">
            <input type="password" required="required" name="password" >
            <label>Password</label>
            </div>

            <button type="submit" name="submit">Login</button>
            <div class="signup_link">
            Not a member? <a href="beforeSignup.php">Signup</a>
            </div>


            
            
        </form>
   
    </div>
    
</body>