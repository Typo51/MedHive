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

  	$sql = "INSERT INTO image (doc_img_id, pat_img_id, image) VALUES ('$id', '$user_id', '$image')";
  	// execute query
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "<script>alert('Upload Successful')</script>";
      echo "<script>window.open('documentsWatcher.php?acct_id=$id','_self')</script>";
  	}

  }



?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Documents Center
	</title>
	<link rel="stylesheet" type="text/css" href="./css/dropdown.css">
	<link rel="stylesheet" type="text/css" href="css/recordsCenter.css">


	 	<!-- BOOTSTRAP -->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>

</head>
<body>
<div class="doc-container">
	<div class="nav">
		<h4>Files from Dr. <?php echo "$firstname"; ?></h4>
	</div>

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
					<a href="#" > <button class="waves-effect waves-light btn">Delete</button></a> 
	    		</div>
    		</div>
    	</form>

<div class="file-container">
	<div class='docu'></div>

<?php 

		$select_query="Select * from `account`, `document_sessions` WHERE acct_id = sess_doc_id AND $user_id = sess_pat_id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {

		   	$dates = $row['sess_sched_date'];

		 	echo"

		 		<a style='margin-left: 20px;' class='waves-effect waves-light btn' type='button' href='prescriptionWatcher.php?acct_id=$id&&date_id=$dates'>$dates</a>



		 	";
		 }





 ?>
 	


</div>


</body>
</html>