<?php 

	include ('connect.php');
	include ('side.php');


	if(isset($_GET['passer_id']))
	{
		$id = $_GET['passer_id'];
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
	<link rel="stylesheet" type="text/css" href="css/recordsCenter.css">


	 	<!-- BOOTSTRAP -->
	 
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <link rel="stylesheet" href="./css/sidebars.css">
  <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div class="doc-container">
	<div class="nav">
		<a href="documentsCenter.php?acct_id=<?php echo $user_id ?>"><i class="fa-solid fa-arrow-left"></i> </a>
		<h4>Files from Dr. <?php echo "$firstname"; ?></h4>
	</div>

		      <!-- BUTTONS FOR DOCUMENTS-->
   	

<div class="file-container">
<?php 

		$select_query="Select * from `document_sessions` WHERE $id = sess_doc_id AND $user_id = sess_pat_id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {

		   	$dates = $row['sess_sched_date'];

		 	echo"

		 		<a style='margin-left: 20px;' class='waves-effect waves-light btn' type='button' target='_blank' href='prescriptionWatcher.php?acct_id=$id&&date_id=$dates'><div class='card'> $dates Prescription </div></a> 

		 		<a style='margin-left: 20px;' class='waves-effect waves-light btn' type='button' target='_blank' href='diagnosisWatcher.php?acct_id=$id&&date_id=$dates'><div class='card'>$dates Diagnosis </div></a> 



		 	";
		 }





 ?>
</div>

<script type="text/javascript" src="js/events.js"></script>
</body>
</html>