<?php
  include('connect.php');
  include('side.php');
  
$user_id = $_SESSION['user_id'];

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
      $first_name=$row['first_name'];
      $last_name=$row['last_name'];
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
 		<?php echo"$first_name" ?>'s Profile
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
     $last_name=$row['last_name'];
     $first_name=$row['first_name'];
     $specialization=$row['specialization'];


     /*PROFILE BUBBLE*/

     echo " 
     


    <div class='container-profile'>
  <div class='avatar'>
    <!-- INSERT AVATAR HERE -->
  </div>

  <div class='wrapper-profile'>
    <div class='name'>
      <h5>$first_name $last_name M.D.</h5>
    </div>

    <div class='specialty'>
      <p>$specialization</p>
    </div>
  </div>

</div>";

   }
 ?>
 		</div>
 	</div>
<hr>

<!-- ABOUT AREA -->
<?php  


    $select_clinic = "SELECT * FROM `clinic_info` WHERE doc_clinic_id = $user_id";
    $result_clinic = mysqli_query($con, $select_clinic);

    
    while ($row=mysqli_fetch_assoc($result_clinic)) {
      // code...
    
    $address = $row['clinic_address'];
    $days = $row['office_days'];
    $time = $row['office_time'];
    $contact = $row['contact_info'];

  }

  $select_bio="SELECT * FROM `doctor` WHERE doc_acc_id = $user_id";
  $result_bio=mysqli_query($con, $select_bio);
  while($row=mysqli_fetch_assoc($result_bio)){
    $bio=$row['bio'];
  }

   
   echo"

<div class='container-about'>

   <div class='personal-info'>
    <h6>I love helping people in need. :)</h6>
    



  </div>

  <div class='clinic-info'>
    <h5><b>$specialization</b></h5>
    <h6>$address</h6>
    <h6>City of Koronadal, South Cotabato, 9506</h6>
    <h6><b>$contact</b></h6>
    <br>
    <h5><b>Office Hours</b></h5>
    <h6>$days</h6>
    <h6>$time</h6>
    <br>
    
    
  </div>

  </div>";
?>
<div class="action-buttons">

  <a href="editProfile.php?acct_id=<?php echo "$user_id";?>" class="btn btn-primary">Edit Profile</a>

  <button onclick="sched()" class="btn btn-primary">Set Schedule</button>

  <button onclick="logs()" class="btn btn-primary">Appointment Logs</button>
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
        {  
          $doctorID = $_SESSION['user_id'];
          $dater = $_POST['dater'];
          $timer = $_POST['timer'];


          foreach ($timer as $time_sched) {
            $sql2 = "INSERT INTO `doctors_availability` (doctor_id, avail_date, avail_time) VALUES ('$doctorID','$dater', '$time_sched')";
          $resultar=mysqli_query($con,$sql2);
          }

          
    
           if($resultar){
             echo "<script>alert ('Schedule Added!')  </script>";
             echo "<script>window.open('doctorsProfileReal.php?acct_id=$id','_self')</script>";
         
         
           }else{
             die(mysqli_error($con));
           }
         
        

        }
          
             
      ?>

      <br>
      <label>Select Date</label>
      <br>
      <input required="required" type="date" name="dater">
      
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

  <!-- APPOINTMENT LOGS -->


<div class="popup3" id="modal3" >
  <div class="container">
    <h4>Appointment Logs</h4>
    <table class="striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Doctor's Name</th>
          <th>Clinic Address</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>09-25-22</td>
          <td>3:15 PM</td>
          <td>Jasper L. Panzo</td>
          <td>Alunan Avenue, City of Koroandal</td>
        </tr>
        <tr>
          <td>09-25-22</td>
          <td>3:15 PM</td>
          <td>Jasper L. Panzo</td>
          <td>Alunan Avenue, City of Koroandal</td>
        </tr>
        <tr>
          <td>09-25-22</td>
          <td>3:15 PM</td>
          <td>Jasper L. Panzo</td>
          <td>Alunan Avenue, City of Koroandal</td>
        </tr>
      </tbody>
    </table>
    <div></div>
    <a href="#" onclick="logs()"> <button class="buttons" id="cancel">Cancel</button></a> 
    
  </div>
</div>

<script src="js/events.js"></script>
 </body>
 </html>