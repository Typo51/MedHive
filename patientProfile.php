<?php 

	include ('connect.php');
  include ('side.php');
  $user_id = $_SESSION['user_id'];
	if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$select_query="Select * from `account` WHERE acct_id = $id";
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
	<link rel="stylesheet" type="text/css" href="./css/dropdown.css">
  <link rel="stylesheet" type="text/css" href="patientProfile.css">



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



    <!-- DOCUMENT AREAS -->

   	<div class="docs-container">
      <center>
      <a href="symptomsForm.php?acct_id=<?php echo $user_id;?>">Symptoms Form</a>
      </center>
      <!-- BUTTONS FOR DOCUMENTS-->
   		
		<form  method="POST" enctype="multipart/form-data">
			<div class="header">
	   			<div>
	        		<input type="file" name="image" class="waves-effect waves-light btn" value="Upload" style="margin-right: 30px;">
	        	</div>
		
	        	<div>
	        		<button class="waves-effect waves-light btn" type="submit" name="upload">Upload</button>
	        	</div>
	        	<div>
					<a href="#"> <button class="waves-effect waves-light btn">Delete</button></a> 
	    		</div>
    		</div>
    	</form>
   		

      <!-- COLLAPSIBLES OF DOCUMENTS -->


<div class="file-container">
        <?php
          $select_query="Select * from `account`, `image` WHERE pat_img_id = $id AND acct_id = doc_img_id GROUP BY doc_img_id";
          $result=mysqli_query($con,$select_query);
          $i=1;
           if($result){
             while ($row=mysqli_fetch_assoc($result)){
              $firstname=$row['first_name'];
              $lastname= $row['last_name'];

              ?>
             <a href='documentsCenter.php?acct_id=<?php echo $row['acct_id']?>' class='doctor-file'>
              <?php echo " Dr. $firstname $lastname </a>";
              }
              }
              $i++;
          ?>

          
</div>





<script type="text/javascript" src="js/dropdown.js"></script>
</body>
 </html>