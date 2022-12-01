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
			   $first_name=$row['first_name'];
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
 	<title> <?php echo "$first_name's" ?> Profile </title>
  <link rel="stylesheet" type="text/css" href="./css/recordsCenter.css">
	<link rel="stylesheet" type="text/css" href="./css/doctorViewToPatient.css">
  <link rel="stylesheet" type="text/css" href="./css/patientProfile.css">




 	<!-- BOOTSTRAP -->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
 </head>
<body style="margin-left: 45px;">



      <?php 

$select_query="Select * from `account`, `patient` WHERE acct_id = $id";
$result=mysqli_query($con,$select_query);

   while ($row=mysqli_fetch_assoc($result)) 
   {
     $last_name=$row['last_name'];
     $first_name=$row['first_name'];
     $sex=$row['sex'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
      <img src='images/icon.png '>
      <div class='patient-profile'>
      <h5>$first_name $last_name</h5>
        <div class='profile'>
          <p>$sex</p>
        </div>
      </div>
      
    </div>";

   }
 ?>

<div class='container-about'>
    
    <?php 

  $select_info = "SELECT * FROM `patient` WHERE pat_acc_id = $id";
  $select_query = mysqli_query($con, $select_info);

  $row=mysqli_fetch_assoc($select_query);
  $sex=$row['sex'];
  $address=$row['address'];
  $birth=$row['birthday'];
  $height=$row['height'];
  $weight=$row['weight'];
  $contact=$row['contact_num'];

  echo " <div class='wrapper-about'>
     <div class='first-layer'>
       <div> 
        <h6><b>Sex</b></h6>
        <h6> $sex</h6>
      </div>
      <div>
        <h6><b>Date of Birth</b></h6> 
        <h6>$birth</h6>
      </div>
     </div>

     <div class='second-layer'>
       <div> 
        <h6><b>Height</b></h6>
        <h6> $height</h6>
      </div>
      <div>
        <h6><b>Weight</b></h6> 
        <h6>$weight</h6>
      </div>
     </div>

     <div class='appoint-button'>
      <a style='margin-left: 20px;' class='waves-effect waves-light btn' target='_blank' type='button' href='diagnosisPrescriptionForm.php?acct_id=<?php echo $id;?>&&date_id=<?php echo $date_id;?>'>Appoint Patient</a>
      </div>
  </div>

    <div class='contact-info'>
       <h5><b>Contact Info & Address</b></h5>
       <h6>$address</h6>
       <h6>City of Koronadal, South Cotabato, 9506</h6>
       <br>
       <h6>$contact</h6>      
      
</div>";

?>
        
        </div>        
      

    

  <!-- DOCUMENTS SHARING PART -->
<div class="doc-wrapper">
  
      <center>
        <h4><?php echo "$first_name"; ?>'s files from you</h4>
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
        <h4 class="shared-header"><?php echo "$first_name"; ?>'s shared files</h4>
      </center>

<div class="personal-docs">
    <div class='docu'>


<?php 

  $select_share = "SELECT * FROM `shared_docs` WHERE share_doc_id = '$user_id' AND share_pat_id = $id";
  $run_share = mysqli_query($con, $select_share);

  while ($row=mysqli_fetch_assoc($run_share)) {
    $file_name = $row['image'];


    echo "

     
          <a class='waves-effect btn' href='./images/".$file_name."' target='_blank'> $file_name </a> <hr>


    ";
  }




 ?>






</div>


</div>


         <!-- SEND EMAIL AREA -->

   <form class="" action="send.php" method="post">
    <input type="text" name="acct_id" value="<?php echo $_GET['acct_id'] ?>" style="display:none">
    <input type="text" name="date_id" value="<?php echo $_GET['date_id'] ?>" style="display:none">
<label>Email To:</label><input type="email" name="email" value=""><br>
     <label>Subject:</label><input type="text" name="subject" value=""><br>
     <label>Message:</label><input type="text" name="message" value=""><br><br>
 <button type="submit" name="send" class="waves-effect waves-light btn">Send</button>
      
         </form>

<script type="text/javascript" src="js/dropdown.js"></script>
</body>
 </html>