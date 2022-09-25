<?php 

	include ('connect.php');

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$select_query="Select * from `patient` WHERE id = $id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {

		 	$id=$row['id'];
			$firstname=$row['first_name'];
		 }

	}
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title> <?php echo "$firstname's" ?> Profile </title>
	<link rel="stylesheet" type="text/css" href="./css/recordsCenter.css">
	<link rel="stylesheet" type="text/css" href="./css/dropdown.css">



 	<!-- BOOTSTRAP -->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
 </head>
<body>


<?php 

$select_query="Select * from `patient` WHERE id LIKE $id";
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


    <!-- DOCUMENT AREAS -->

   	<div class="docs-container">
		<div class="wrapper">
			<button class="collapsible">Dr. Jasper Panzo</button>
				<div class="content">
					<button class="collapsible"><h4>09-10-22</h4></button>
					  <div class="content">
					  	<a href="./images/profile.webp"><h4>prescription.jpg</h4></a>
					  </div>
				  	<button class="collapsible"><h4>09-15-22</h4></button>
					  <div class="content">
					  	<a href="./images/profile.webp"><h4>prescription.jpg</h4></a>
					  </div>
					<button class="collapsible"><h4>09-10-22</h4></button>
					  <div class="content">
					  	<a href="./images/profile.webp"><h4>prescription.jpg</h4></a>
					  </div>
					  <button class="collapsible"><h4>09-10-22</h4></button>
					  <div class="content">
					  	<a href="./images/profile.webp"><h4>prescription.jpg</h4></a>
					  </div>
					<div class="anchor"></div>	 
				</div>
		</div>






   	</div>



<script type="text/javascript" src="dropdown.js"></script>
</body>
 </html>