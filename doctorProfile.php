<?php
  include('connect.php');
  include('side.php');
  


if(isset($_SESSION['user']) && $_SESSION['user'] != ''){

}
else{

}

if(isset($_GET['acct_id']))
  {
    $id = $_GET['acct_id'];
    $select_query="Select * from `account` WHERE acct_id = $id";
    $result=mysqli_query($con,$select_query);

     while ($row=mysqli_fetch_assoc($result)) 
       {

      $id=$row['acct_id'];
      $firstname=$row['first_name'];
      $doctorfullname=$row['first_name']." ".$row['last_name'];
     }

  }


  if (isset($_POST['submit'])) {
    $patientID  =$_SESSION['user_id'];
    $sqlpatient="Select * from `account` WHERE acct_id = $patientID";
    $resultpatient=mysqli_query($con,$sqlpatient);
    $rowpatient = mysqli_fetch_assoc($resultpatient);
    $fullname= $rowpatient['first_name']." ".$rowpatient['last_name'];
    $date       =$_POST['date'];
    $time       =$_POST['time'];
    $type       =$_POST['type'];
   



  $sql = "INSERT INTO `appointment` (doc_id, Fullname, docfullname, pat_id, sched_date, sched_time, `type`) VALUES ( '$id', '$fullname','$doctorfullname','$patientID', '$date', '$time', '$type')";


    $result = mysqli_query($con, $sql);

    
    if($result){
      echo "<script>alert ('Appointed!')  </script>";
      echo "<script>window.open('patientsdb.php','_self')</script>";


    }else{
      die(mysqli_error($con));
    }


  }

?>


 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>
 		<?php echo"$firstname" ?>'s Profile
 	</title>
 	

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" type="text/css" href="./css/doctorProfile.css">
	<link rel="stylesheet" href="./css/buttons.css">
	<link rel="stylesheet" href="./css/modals.css">
 </head>
 <body>

<div class="whole-container">
 	<div class="header">
 		<div class="profile-bubble">
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
	    		<p> $specialization</p>
	    		<p> $sex</p>
	    	</div>
    	</div>
    	
    </div>";

   }
 ?>
 		</div>
 	</div>
<hr>



<div class='container-about'>

   <div class="personal-info">
    
  </div>

  <div class="clinic-info">
    
  </div>




 

  </div>

<div class="action-buttons">
        <button onclick="setAppoint()" class="btn btn-primary">Set Appointment</button>
  </div>





</div>



<!-- SETUP FOR APPOINTMENT -->





 ?>
<div class="modal-appoint" id="modal-appoint">
  <div class="appointment">

  <form method="POST">
  
    <?php
     if(isset($_POST['pick']))
        {   
          $formaccid = $_GET['acct_id'];
          $date = $_POST['date'];

          $sql = "SELECT * FROM `doctors_availability` WHERE doctor_id ='$formaccid' AND avail_date = '$date' AND status = 1";
           $resultpick= $con->query($sql);

           ?>

           <?php
    if($resultpick->num_rows > 0){
          echo "
          <label>Choose Time</label>
          <select class= 'dropdown-trigger btn'name='time'>
          ";

          while ($row=mysqli_fetch_assoc($resultpick)) {
            
               
            ?>
      <option value='<?php echo $row['avail_time']; ?>'><?php echo $row['avail_time']; ?></option>
     <?php 
   
          }
          echo "</select>";
        }
      }
          ?>
        <label>Choose a Date</label>
            <div class="date-picker">
        <input required='required' type="date" name="date" value='<?php echo $date ?>'>
        <input type="submit" name="pick" value="Pick Date" class="waves-effect btn">
    </div>
    <label>Appointment Type</label>
    <select class="dropdown-trigger btn" name="type"> 
        <option value="Face to face">Face to face</option>
        <option value="Virtual">Virtual</option>
     </select> 

     <div class="appointment-button">
      <input type='submit' name='submit' value='Appoint!' class="waves-effect btn">
  </form>

<button class="waves-effect btn" onclick="setAppoint()">Cancel</button>
</div>

</div>
</div>
</div>

<?php 

   if(isset($_POST['submit']))
        { 
          
            
          $time = $_POST['time'];
          $date = $_POST['date'];
          

          $sql1 = "UPDATE `doctors_availability` SET `status`= '0' WHERE avail_date = '$date' AND  `avail_time` = '$time'";
          $resultar=mysqli_query($con,$sql1);
        
        }

        

       ?>

<script src="js/events.js"></script>
 </body>
 </html>
