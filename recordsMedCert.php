<?php 

	include ('connect.php');
	include ('side.php');
	 
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
  	$type = '2';

  	$sql = "INSERT INTO `image` ( pat_img_id, image, type) VALUES ('$user_id', '$image', '$type')";
  	// execute query
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "<script>alert('Upload Successful')</script>";
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
	<link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    > <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>

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
	<div class='docu'></div>
  	<div class="popupBtn">
  		<button class="popupDelete"><i class="fa-solid fa-xmark"></i></button>
	</div>
<?php 

  	$type = '2';
		$select_query="Select * from `image` WHERE '$user_id' = pat_img_id AND type = '$type'";

     $result=mysqli_query($con,$select_query);
     $i=1;
   	if($result){
   		while ($row=mysqli_fetch_assoc($result)){
       		$file_name = $row['image'];

       		echo "
       		<div class='docu'>
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

	$show_documents = "SELECT * FROM `image` WHERE pat_img_id = $user_id AND type ='2'";
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
	

		$insert_share = "INSERT INTO `shared_docs`(`share_doc_id`, `share_pat_id`, `image`) VALUES ('$doctorName','$user_id','$imageName')";
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