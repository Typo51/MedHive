<?php 

  include ('connect.php');
	include ('side.php');
  

  ob_start();


   
   


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
  <link rel="stylesheet" href="./css/sidebars.css">


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
             <a href='documentsWatcher.php?passer_id=<?php echo $row['acct_id']?>' class='waves-effect waves-light btn'><div class='card'>
              <?php echo " Dr. $firstname $lastname </div></a> <br>";
              }
              }
              $i++;
          ?>

          
</div>


<div class="main-cards">
  
<?php 

    $select_query="Select * from `account`, `image` WHERE pat_img_id = $id AND acct_id = doc_img_id GROUP BY doc_img_id";


 if($result){
             while ($row=mysqli_fetch_assoc($result)){




             }
           }
 


echo "
  <div class='card'><a href='recordsLab.php?acct_id=$user_id' class='waves-effect waves-light btn'> Lab Results </a></div>
  <div class='card'><a href='recordsMedCert.php?acct_id=$user_id' class='waves-effect waves-light btn'> Medical Certificates </a></div>
  <div class='card'><a href='recordsOthers.php?acct_id=$user_id' class='waves-effect waves-light btn'> Other Records </a></div> 

";
?>

</div>
 	</div>
   <script type="text/javascript" src="js/events.js"></script>
</body>
</html>