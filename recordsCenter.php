<?php 
 include('connect.php');


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Record's Center</title>
	<link rel="stylesheet" type="text/css" href="recordsCenter.css">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>


</head>
<body>


<?php 

$select_query="Select * from `patient` WHERE id LIKE 3";
$result=mysqli_query($con,$select_query);

   while ($row=mysqli_fetch_assoc($result)) 
   {
    $id=$row['id'];
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