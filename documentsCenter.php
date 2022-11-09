<?php 

	include ('connect.php');
  	session_start();
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
	<link rel="stylesheet" type="text/css" href="css/patientProfile.css">
</head>
<body>


<div class="doc-container">
	
<?php 

	
	$select_query="Select * from `image` WHERE '$user_id' = pat_img_id AND doc_img_id = $id";

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


 ?>
 	</div>
</div>

</body>
</html>