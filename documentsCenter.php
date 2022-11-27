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
<body style="margin-left: 65px;">


<div class="doc-container">
	<div class="nav">
		<h4><?php echo "$firstname"; ?>'s Documents</h4>
	</div>


   		

      <!-- LISTS OF DOCTOR DOCUMENTS -->


<div class="folder-container">
        <?php

          $select_query="Select * from `account`, `prescription` WHERE pres_pat_id = $id AND acct_id = pres_doc_id GROUP BY pres_doc_id";

          $result=mysqli_query($con,$select_query);
          $i=1;
           if($result){
             while ($row=mysqli_fetch_assoc($result)){
              $firstname=$row['first_name'];
              $lastname= $row['last_name'];

              ?>
             <a href='documentsWatcher.php?passer_id=<?php echo $row['acct_id']?>' class='waves-effect waves-light btn'>
              <?php echo " Dr. $firstname $lastname </a> <br>";
              }
              }
              $i++;
          ?>

          
</div>


<div class="medRec-container">
  
<?php 

    $select_query="Select * from `account`, `image` WHERE pat_img_id = $id AND acct_id = doc_img_id GROUP BY doc_img_id";


 if($result){
             while ($row=mysqli_fetch_assoc($result)){




             }
           }
 


echo "
  <a href='recordsLab.php?acct_id=$user_id' class='waves-effect waves-light btn'> Lab Results </a> <br>
  <a href='recordsMedCert.php?acct_id=$user_id' class='waves-effect waves-light btn'> Medical Certificates </a> <br>
  <a href='recordsOthers.php?acct_id=$user_id' class='waves-effect waves-light btn'> Other Records </a> <br>

";
?>

</div>
 	</div>

</body>
</html>