<?php 

	include ('connect.php');
  include ('side.php');

  $doctorID= $_SESSION['user_id'];
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

  	$sql = "INSERT INTO image (doc_img_id, pat_img_id, image) VALUES ('$doctorID', '$id', '$image')";
  	// execute query
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "<script>alert('Upload Successful')</script>";
      echo "<script>window.open('doctorViewToPatient.php?acct_id=$id','_self')</script>";
  	}

  }

  
  $resultar = mysqli_query($con, "SELECT * FROM `image` where doc_img_id = $doctorID AND pat_img_id = $id");

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
<body style="margin-left: 45px;">



      <?php 

$select_query="Select * from `account` WHERE acct_id = $id";
$result=mysqli_query($con,$select_query);

   while ($row=mysqli_fetch_assoc($result)) 
   {
     $id=$row['acct_id'];
     $surname=$row['last_name'];
     $firstname=$row['first_name'];
     $specialization=$row['specialization'];
     $sex=$row['gender'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
      <img src='images/icon.png '>
      <div class='patient-profile'>
      <h5>$firstname $surname</h5>
        <div class='profile'>
      
          <p>Sex: $sex</p>
        </div>
      </div>
      
    </div>";

   }
 ?>


    <!-- DOCUMENT AREAS -->

   	<div class="docs-container">
      <center>
      <a href="symptomsFormView.php?acct_id=<?ph  echo $user_id;?>">Symptoms Form</a>
      </center>
      <!-- BUTTONS FOR DOCUMENTS-->
   		
		<form  method="POST" method="uploadFunction.php?acct_id=<?php echo $_GET['acct_id']?>" enctype="multipart/form-data">
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
   		

      <!-- COLLAPSIBLES OF DOCUMENTS -->


		<div class="wrapper">
			<button class="collapsible">
        <?php   

          $select_query="Select * from `account` WHERE acct_id = $doctorID";
          $result=mysqli_query($con,$select_query);

          $i=1;
          if($result)
          {
             while ($row=mysqli_fetch_assoc($result)) 
             {
              $firstname=$row['first_name'];
              $lastname= $row['last_name'];
        echo "Dr. $firstname $lastname"; 
              }
          $i++;
          }
        
          ?>
        </button>
				<div class="content">         
            <?php
                $i=1;
              if($resultar)
              {
                while ($row = mysqli_fetch_array($resultar)) 
                {
                  $file_name = $row['image'];


                    echo "<a href='./images/".$row['image']."' target='_blank'> $file_name </a> <br>";
                    $i++;
                }


              }
              else
              {
              die(mysqli_error($con));
             } 
            ?>
            <div class="anchor"></div>  
				</div>
		</div>




<script type="text/javascript" src="js/dropdown.js"></script>
</body>
 </html>