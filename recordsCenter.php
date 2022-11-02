<?php 
 	include('connect.php');


		$select_query="Select * from `patient` WHERE patient_id = 2";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {

	 	$id=$row['patient_id'];
		$firstname=$row['first_name'];
		 }
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> <?php echo "$firstname's" ?> Profile</title>
	<link rel="stylesheet" type="text/css" href="css/recordsCenter.css">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>


</head>
<body>


<?php 

$select_query="Select * from `patient` WHERE patient_id LIKE $id";
$result=mysqli_query($con,$select_query);

   while ($row=mysqli_fetch_assoc($result)) 
   {
     $id=$row['patient_id'];
     $surname=$row['last_name'];
     $firstname=$row['first_name'];
     $age=$row['age'];
     $sex=$row['sex'];
     $religion=$row['religion'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
    	<img src='images/profile.webp'>
    	<div class='patient-profile'>
    	<h5>$firstname $surname</h5>
	    	<div class='profile'>
	    		<p>Age: $age</p>
	    		<p>Sex: $sex</p>
	    		<p>Religion: $religion</p>
	    	</div>
    	</div>
    	
    </div>";

   }
 ?>


    <!-- MENU BUTTONS -->

    <div class="container-menu">
	 	<div class="menu">
	 		<a href="diagnosis.php">
	 			<h6>Diagnosis</h6>
	 		</a>
	 	</div>

	 	<div class="menu">
	 		<a href="prescription.php">
	 			<h6>Prescription</h6>
	 		</a>
	 	</div>

	 	<div class="menu">
	 		<a href="medDocs.php">
	 			<h6>Medical Documents</h6>
	 		</a>
	 	</div>
	 </div>
</body>
</html> 