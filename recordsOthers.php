<?php 

	include ('connect.php');
	include ('side.php');
	include ('newModals.php');

	 
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
	
	if(isset($_GET['acct_id']))
	{
		$select_query="Select * from `account` WHERE acct_id = $id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {
			$first_name=$row['first_name'];
		 }

	}

	 // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];

  	// image file directory
  	$target = "images/".basename($image);
  	$type = '3';

  	$sql = "INSERT INTO `image` ( pat_img_id, image, type) VALUES ('$user_id', '$image', '$type')";
  	// execute query
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "<script>
  			success();
  		</script>";
  	}

  }



?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Documents Center
	</title>
	<link rel="stylesheet" type="text/css" href="css/modals.css">
	<link rel="stylesheet" type="text/css" href="css/recordsCenter.css">
	<link rel="stylesheet" href="./css/sidebars.css">


	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>

<div class="doc-container">
	<div class="nav">
	<div class="back">
	<a href="documentsCenter.php?acct_id=<?php echo $user_id ?>"><i class="fa-solid fa-arrow-left"></i> </a>
	</div>
		<h4>Files from Dr. <?php echo "$first_name"; ?></h4>
	</div>

		      <!-- BUTTONS FOR DOCUMENTS-->
			<div class="records-header">
				

		<form  method="POST" enctype="multipart/form-data">
	        		<input required="required" type="file" name="image" class="waves-effect waves-light btn" value="Upload" style="margin-right: 30px;">

	        		<button class="waves-effect waves-light btn" type="submit" name="upload">Upload</button>
	        		<a href="#" > <button class="waves-effect waves-light btn" id="deleteBtn">Delete</button></a>
	    </form>
	        		
	    		<button onclick="shareBtn()" class="btn btn-primary">Share</button>

	    		<form method="POST">
	        		<input type="submit" name="stop" class="waves-effect btn" value="STOP SHARING">
					
	    		</form>
    		</div>
    	

    	<!-- END FOR BUTTONS FOR DOCUMENTS -->


<div class="file-container">
<?php 

  	$type = '3';
		$select_query="Select * from `image` WHERE '$user_id' = pat_img_id AND type = '$type'";

     $result=mysqli_query($con,$select_query);
     $i=1;
   	if($result){
   		while ($row=mysqli_fetch_assoc($result)){
   				$image_id = $row['img_id'];
       		$file_name = $row['image'];

       		echo "
       		<div class='docu'>
       		<a href='deletefunction.php?img_id=$image_id'><i class='fa-solid fa-xmark' style='color: red;'></i>|</a>
       		<a href='./images/".$file_name."' target='_blank'> $file_name </a> <br><hr>";
        }
    	$i++;
    }

    if (isset($_POST['stop'])) {
			
    	$delete_share = "DELETE FROM `shared_docs` WHERE  share_pat_id = $user_id";
    	$delete_sql =  mysqli_query($con, $delete_share);

			}
 ?>
 	


</div>
</div>



<!-- SHARE DOCUMENT AREA -->

<?php 

	$show_doctor = "SELECT * FROM `appointment`, `account` WHERE pat_id = $user_id AND doc_id = acct_id";
	$showDoctor_query = mysqli_query($con, $show_doctor);

	$show_documents = "SELECT * FROM `image` WHERE pat_img_id = $user_id AND type ='3'";
	$showDocs_query = mysqli_query($con, $show_documents);




 ?>


<div class="popup-share" id="popup_share">
	<div class="container">
		<form method="POST">
			<h4> Select a Doctor to Share With </h4>
			<div>
				<select class="waves-effect btn" name="doctor-share">
				<?php 
						
						while($row=mysqli_fetch_assoc($showDoctor_query)){

							$doc_id = $row['doc_id'];
							$docLast = $row['last_name'];
							$docFirst = $row['first_name'];

							echo "
									<option value='$doc_id'>$docFirst $docLast</option>
							";
							
					}


				 ?>
				</select>
 			</div>
			<h4> Select A file to share </h4>
			<div>
				<select  class="waves-effect btn" name="file-share">
				<?php 
						
						while($row=mysqli_fetch_assoc($showDocs_query)){

							$docuName = $row['image'];

				echo "
								
									<option value='$docuName'> $docuName </option>

				
						";	
					}


				 ?>

				</select>

			</div>
			

			<button  onclick="confirmPw()" class="waves-effect btn">Share</button>
		
			<button onclick="shareBtn()" class="waves-effect btn" id="cancel">Cancel</button>
	

<!-- PASSWORD VERIFICATION -->

<?php 






if (isset($_POST['confirm'])) {
  
  $password = $_POST['password'];


   $sql = "SELECT * FROM `account` WHERE acct_id = $user_id AND password ='$password'";
  $result = mysqli_query($con, $sql);

  if ($result->num_rows > 0) {

  		$imageName = $_POST['file-share'];
		$doctorName = $_POST['doctor-share'];
	

		$insert_share = "INSERT INTO `shared_docs`(`share_doc_id`, `share_pat_id`, `image`) VALUES ('$doc_id','$user_id','$docuName')";
		$insert_query = mysqli_query($con, $insert_share);

   

  }

  else {
            echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
        }

}

 



 ?>


	</div>
</div>



<div class="confirm" id="confirm">
  
  <div class="confirmation">
    <h4>Enter your Password</h4>
    <input type="password" required="required" name="password">
    <div>
      <button class="waves-effect btn" onclick="confirmPw()">Cancel</button>
      
        <input type="submit" name="confirm" value="Confirm" class="waves-effect btn">
  
    </div>
    </div>


</div>
</form>

<script type="text/javascript" src="js/events.js"></script>
</body>
</html>