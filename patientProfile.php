<?php 

	include ('connect.php');
  include ('side.php');

  ob_start();
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

  

  
  $resultar = mysqli_query($con, "SELECT * FROM `image`, `account` where pat_img_id = $id AND doc_img_id = acct_id GROUP BY doc_img_id");

 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title> <?php echo "$firstname's" ?> Profile </title>
	<link rel="stylesheet" type="text/css" href="./css/recordsCenter.css">
	<link rel="stylesheet" type="text/css" href="./css/patientProfile.css">



 	<!-- BOOTSTRAP -->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
 </head>
<body style="margin-left: 45px;">



      <?php 

$select_query="Select * from `account` WHERE acct_id = $id";
$result=mysqli_query($con,$select_query);

   while ($row=mysqli_fetch_assoc($result)) 
   {
     $last_name=$row['last_name'];
     $first_name=$row['first_name'];
     $avatar=$row['avatar'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
        <img src='./avatar/".$avatar."' id='avatar' onclick='changeAv()'>
        <p>Change your Icon</p>
      <div class='patient-profile'>
      <h5>$first_name $last_name</h5>
        <div class='profile'>
        </div>
      </div>
      
    </div>";

   }
 ?>


<div class="edit-profile">
 <a href="editProfile.php?acct_id=<?php echo "$user_id";?>">Edit Profile</a>
</div>

<!-- ABOUT AREA -->

<div class='container-about'>


  <?php 

  $select_info = "SELECT * FROM `patient` WHERE pat_acc_id = $user_id";
  $select_query = mysqli_query($con, $select_info);

  $row=mysqli_fetch_assoc($select_query);
  $sex=$row['sex'];
  $address=$row['address'];
  $birth=$row['birthday'];
  $height=$row['height'];
  $weight=$row['weight'];
  $contact=$row['contact_num'];

  echo " <div class='wrapper-about'>
     <div class='first-layer'>
       <div> 
        <h6><b>Sex</b></h6>
        <h6> $sex</h6>
      </div>
      <div>
        <h6><b>Date of Birth</b></h6> 
        <h6>$birth</h6>
      </div>
     </div>

     <div class='second-layer'>
       <div> 
        <h6><b>Height</b></h6>
        <h6> $height</h6>
      </div>
      <div>
        <h6><b>Weight</b></h6> 
        <h6>$weight</h6>
      </div>
     </div>

       <button id='docsCenter' class='waves-effect btn' onclick='confirmPw()'>Documents Center</button>
  </div>

    <div class='contact-info'>
       <h5><b>Contact Info & Address</b></h5>
       <h6>$address</h6>
       <h6>City of Koronadal, South Cotabato, 9506</h6>
       <br>
       <h6>$contact</h6>      
      
</div>";

?>

<?php 


if (isset($_POST['confirm'])) {
  
  $password = $_POST['password'];


   $sql = "SELECT * FROM account WHERE acct_id = $user_id AND password ='$password'";
  $result = mysqli_query($con, $sql);

  if ($result->num_rows > 0) {

    header ("Location: documentsCenter.php?acct_id=$user_id");
    ob_end_flush();


  }

  else {
            echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
        }

}

 


 ?>

  


<div class="confirm" id="confirm">
  
  <div class="confirmation">
    <h4>Enter your Password</h4>
    <form method="POST">
    <input type="password" required="required" name="password">
    <div>
      <button class="waves-effect btn" onclick="confirmPw()">Cancel</button>
      
        <input type="submit" name="confirm" value="Confirm" class="waves-effect btn">
      </form>
    </div>
    </div>
</div>

<div class="changeAvatar" id="changeAvatar">
  
<?php 

 if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];

    // image file directory
    $target = "avatar/".basename($image);
    $type = '1';

    $sql = "UPDATE `account` SET `avatar`='$image' WHERE acct_id = $user_id";
    // execute query
    mysqli_query($con, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "<script>alert('Upload Successful')</script>";
    }

  }



 ?>



  <div class="confirmation" enctype='multipart/form-data'>
    <h4>Change your Icon</h4>
    <div class="avatar-wrapper">
      <form method="POST" enctype='multipart/form-data'>
      <label for="uploadIcon">Upload</label>
      <input type="file" name="image" id="uploadIcon" required>
      <br>
      <br>
      <input type="submit" name="upload" class="waves-effect btn">

      </form>
      <button class="waves-effect btn" onclick="changeAv()">Cancel</button>

    </div>

</div>
  

<script type="text/javascript" src="js/events.js"></script>
</body>
 </html>

