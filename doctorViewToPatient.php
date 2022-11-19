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

  if(isset($_GET['date_id']))
  {
    $date_id = $_GET['date_id'];
  }
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title> <?php echo "$firstname's" ?> Profile </title>
  <link rel="stylesheet" type="text/css" href="./css/recordsCenter.css">
	<link rel="stylesheet" type="text/css" href="./css/doctorViewToPatient.css">



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

<div class='container-about'>
      <div>
          <a style="margin-left: 20px;" class="waves-effect waves-light btn" target="_blank" type="button" href="diagnosisPrescriptionForm.php?acct_id=<?php echo $id;?>&&date_id=<?php echo $date_id;?>">Appoint Patient</a>
      </div>
  </div>
  

  <!-- DOCUMENTS SHARING PART -->
<div class="doc-wrapper">
  
      <center>
        <h4><?php echo "$firstname"; ?>'s files from you</h4>
      </center>

  <!-- FILES FROM DOCTORS -->
  <div class="doctors-docs">

  <?php 

    $select_query="Select * from `document_sessions` WHERE $doctorID = sess_doc_id AND $id = sess_pat_id";
    $result=mysqli_query($con,$select_query);

     while ($row=mysqli_fetch_assoc($result)) 
       {

        $dates = $row['sess_sched_date'];

      echo"

        <a style='margin-left: 20px;' class='waves-effect waves-light btn' type='button' target='_blank' href='prescriptionWatcherDoctor.php?acct_id=$id&&date_id=$dates'>$dates</a>



      ";
     }




   ?>
</div>

<!-- PERSONAL FILES -->
       <center>
        <h4 class="shared-header"><?php echo "$firstname"; ?>'s shared files</h4>
      </center>

<div class="personal-docs">
  
 <?php 

    $select_query="Select * from `document_sessions` WHERE $doctorID = sess_doc_id AND $id = sess_pat_id";
    $result=mysqli_query($con,$select_query);

     while ($row=mysqli_fetch_assoc($result)) 
       {

        $dates = $row['sess_sched_date'];

      echo"

        <a style='margin-left: 20px;' class='waves-effect waves-light btn' type='button' target='_blank' href='prescriptionWatcherDoctor.php?acct_id=$id&&date_id=$dates'>$dates</a>



      ";
     }




   ?>







</div>


</div>


<script type="text/javascript" src="js/dropdown.js"></script>
</body>
 </html>