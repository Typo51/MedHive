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

<div class="file-container">
<?php 

	
	$select_query="Select * from `image` WHERE '$user_id' = pat_img_id AND doc_img_id = $id";

     $result=mysqli_query($con,$select_query);
     $i=1;
   	if($result){
   		while ($row=mysqli_fetch_assoc($result)){
       		$file_name = $row['image'];

       		echo "
       		<div class='docu'>
       		<a href='./images/".$file_name."' target='_blank'> $file_name </a> <br><hr>
       		</div>";
        }
    	$i++;
    }


 ?>
 	


</div>


</body>
</html>