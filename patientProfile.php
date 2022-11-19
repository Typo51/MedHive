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


 


  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO image (doc_img_id, pat_img_id, image) VALUES ('$doctorID', '$id', '$image')";
  	// execute query
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "<script>alert('Upload Successful')</script>";
      echo "<script>window.open('doctorViewToPatient.php?acct_id=$id','_self')</script>";
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
     $id=$row['acct_id'];
     $surname=$row['last_name'];
     $firstname=$row['first_name'];
     $specialization=$row['specialization'];
     $sex=$row['gender'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
      <img src='images/icon.png '>
      <div class='patient-profile'>
      <h5>$firstname $surname</h5>
        <div class='profile'>
      
          <p>Sex: $sex</p>
        </div>
      </div>
      
    </div>";

   }
 ?>


<div class="edit-profile">
 <a href="profileEdit.php">Edit Profile</a>
</div>



<div class='container-about'>

        <label>Height</label>
        <?php echo "169cm"; ?>
        <label>Weight</label>
        <?php echo "169cm"; ?>
        <label>Heart Rate</label>
        <?php echo "169cm"; ?>
        <label>Blood Pressure</label>
        <?php echo "169cm"; ?>


          <a class="waves-effect waves-light btn" type="button" href="documentsCenter.php?acct_id=<?php echo $user_id;?>">Documents Center</a>
  </div>"

    <!-- DOCUMENT AREAS -->

   	<div class="docs-container">
      <center>
      <a href="symptomsForm.php?acct_id=<?php echo $user_id;?>">Symptoms Form</a>
      </center>

<script type="text/javascript" src="js/dropdown.js"></script>
</body>
 </html>