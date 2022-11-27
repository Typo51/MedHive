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
	

	<link rel="stylesheet" type="text/css" href="./css/doctorProfile.css">
	<link rel="stylesheet" href="./css/buttons.css">
	<link rel="stylesheet" href="./css/modals.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
 </head>
 <body>
<div class="whole-container">
 	<div class="header">
 		<div class="profile-bubble">
 			<?php 

$select_query="Select * from `account`, `doctor` WHERE acct_id = $id AND doc_acc_id = $id";
$result=mysqli_query($con,$select_query);

   while ($row=mysqli_fetch_assoc($result)) 
   {
     $id=$row['acct_id'];
     $surname=$row['last_name'];
     $firstname=$row['first_name'];
     $specialization=$row['specialization'];
     $sex=$row['gender'];
     $address = $row['address'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
    	<img src='images/icon.png '>
    	<div class='patient-profile'>
    	<h5><b> $firstname $surname </b></h5>
	    	<div class='profile'>
	    		<p><b> $specialization</b></p>
	    		<p><b> $sex </b></p>
          <p> $address </p>
	    	</div>
    	</div>
    	
    </div>";

   }
 ?>
 		</div>
 	</div>
<hr>

<!-- ABOUT AREA -->


<div class='container-about'>

       <a href="#" onclick="sched()"> <button class="btn btn-primary">Set Schedule</button></a> 
      
  </div>

</div>

<!-- SET SCHEDULE MODAL -->

  <div class="popup4" id="modal4" >
        <div class="container4">
          <br>
        <h3>Set Schedule</h3>
        <div class="button-group">
          
          

  
  
    <form method="POST">
      <?php 

        if(isset($_POST['pass']))
        {   $doctorID = $_SESSION['user_id'];
          $dater = $_POST['dater'];
          $timer = $_POST['timer'];


          foreach ($timer as $time_sched) {
            $sql2 = "INSERT INTO `doctors_availability` (doctor_id,avail_date, avail_time) VALUES ('$doctorID','$dater', '$time_sched')";
          $resultar=mysqli_query($con,$sql2);
          }

          
    
           if($resultar){
             echo "<script>alert ('Schedule Added!')  </script>";
             echo "<script>window.open('doctorDB.php','_self')</script>";
         
         
           }else{
             die(mysqli_error($con));
           }
         
        

        }
          
             
      ?>

      <br>
      <label>Select Date</label>
      <br>
      <input type="date" name="dater">
      
      <br>
      <br>
      <label>Select Time:</label>
      <br>
      <div class="time">
      <input type="checkbox" checked="checked" name="timer[]" value="8:00">
       <label>8:00am</label>
       <br>
       <input type="checkbox" checked="checked" name="timer[]" value="9:00">
       <label>9:00am</label>
       <br>
       <input type="checkbox"  checked="checked" name="timer[]" value="10:00">
       <label>10:00am</label>
       <br>
       <input type="checkbox" checked="checked" name="timer[]" value="11:00">
       <label>11:00am</label>
       <br>
       <input type="checkbox" checked="checked" name="timer[]" value="12:00pm">
       <label>12:00pm</label>
       <br>
        </div>
        <div class="time2">
      <input type="checkbox" checked="checked" name="timer[]" value="1:00">
       <label>1:00pm</label>
       <br>
       <input type="checkbox" checked="checked" name="timer[]" value="2:00">
       <label>2:00pm</label>
       <br>
       <input type="checkbox"  checked="checked" name="timer[]" value="3:00">
       <label>3:00pm</label>
       <br>
       <input type="checkbox" checked="checked" name="timer[]" value="4:00">
       <label>4:00pm</label>
       <br>
       <input type="checkbox" checked="checked" name="timer[]" value="5:00pm">
       <label>5:00pm</label>
       <br>
        </div>
      <input type="submit" name="pass" >
      <button onclick="sched()">Cancel</button>
  </form>


  




</div>
            </div>
            </div>

<script src="js/events.js"></script>
 </body>
 </html>