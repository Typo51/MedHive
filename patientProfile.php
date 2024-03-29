<?php 

  include ('connect.php');
	include ('side.php');


  ob_start();
	if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$select_query="Select * from `account` WHERE acct_id = $user_id";
		$result=mysqli_query($con,$select_query);
   
	   while ($row=mysqli_fetch_assoc($result)) 
		   {
   
			$id=$row['acct_id'];
			$firstname=$row['first_name'];
   
		 }
   
	}
 
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title> <?php echo "$firstname's" ?> Profile </title>
	<link rel="stylesheet" type="text/css" href="./css/recordsCenter.css">
	<link rel="stylesheet" type="text/css" href="./css/patientProfile.css">
  <link rel="stylesheet" href="./css/sidebars.css">
  <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 	<!-- BOOTSTRAP -->
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
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
     <div class='image'> 
      <img src='./avatar/".$avatar."' id='avatar' onclick='changeAv()'>
     </div>
      <div class='patient-profile'>
      <h2>$first_name $last_name</h2>
        <div class='profile'>
      
          <p></p>
        </div>
      </div>
      
    </div>";

   }
 ?>




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
  <h5><b>About</b></h5><br>
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

       <button id='docsCenter' class='waves-effect btn' onclick='confirmPw()'></button></button>
  </div>

    <div class='contact-info'>
       <h5><b>Contact Info & Address</b></h5><br>
       <h6>$address</h6>
       <h6>City of Koronadal, South Cotabato, 9506</h6>
       <br>
       <h6>$contact</h6>     
       <div class='edit-profile'>
 <a href='editProfile.php?acct_id=<?php echo '$user_id';?>Edit Profile</a>
</div> 
      
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


<!-- CHANGE AVATAR MODAL -->

<div class="changeAvatar" id="changeAvatar">
  
<?php 

 if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];

    // image file directory
    $target = "avatar/".basename($image);

    $sql = "UPDATE `account` SET `avatar`='$image' WHERE acct_id = $user_id";
    // execute query
    mysqli_query($con, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "<script>alert('Upload Successful')</script>";
      echo "<script> window.open('patientprofile.php?acct_id=$user_id', '_self')</script>";
      

    }

  }



 ?>



<div class="confirmation">
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

