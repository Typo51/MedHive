<?php 

	include ('connect.php');
	include ('side.php');
   
	if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$select_query="Select * from `account` WHERE acct_id = $user_id";
		$result=mysqli_query($con,$select_query);
   
	   while ($row=mysqli_fetch_assoc($result)) 
		   {
   
			$id=$row['acct_id'];
			$firstname=$row['first_name'];
   
		 }
   
	}

	if ($_SESSION['activedoctor'] == true){


		

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doctor's Dashboard</title>
	<link rel="stylesheet" href="./css/doctordb.css">
	<link rel="stylesheet" href="./css/buttons.css">
	<link rel="stylesheet" href="./css/modals.css">
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" >
	<!-- BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>


<!-- WELCOME BUBBLE -->
<div class='welcome-bubble'>
				<h5>Welcome to MedHive </h5>
    		</div>


    <!-- ABOVE BUTTONS TO OPEN MODALS -->

    <div class="main_content">
        <div class="header">
        
        		<a href="#" onclick="appointment()"> <button class="btn btn-primary">Accept an Appointment</button></a> 
        	

			
        		<a href="#" onclick="queue()"> <button class="btn btn-primary">List of Appointment </button></a> 
        	
			
        	
	</div>

        <!-- PATIENT LISTS -->
        
    
        <div class="patient-list-container-outside1">
			<table class="table table-striped">
				<thead>
					
						<th style="width: 70px;"> </th>
						<th>Name</th>
						<th>Appointment Date</th>
						<th>Time</th>
						<th>Type</th>
					</tr>
				</thead>
	
				<tbody>
						
					<?php 
						date_default_timezone_set('Asia/Manila');
   					    $date = date("Y/m/d");
						$doctorID = $_SESSION['user_id'];
						$select_query="Select * from `appointment`, `account` WHERE `doc_id` = '$doctorID' AND pat_id =acct_id and `sched_date`='$date' ORDER BY `sched_time`";
						$result=mysqli_query($con,$select_query); 
					$i=1;
					if($result)
					{
					   while ($row=mysqli_fetch_assoc($result)) 
					   {
					    $id=$row['pat_id'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
					     $date=$row['sched_date'];
					     $time=$row['sched_time'];
					     	$avatar=$row['avatar'];
					     
					     
					     echo " 
					     
							<tr class=''>
							<td><img src='./avatar/".$avatar."' style='width: 70px;'></td>
							<td>$first_name</td>
							<td>$last_name</td>
							<td>$date</a></td>
							<td>$time</a></td>
							<td> ";?>

							<?php 


							if ($row['type'] == '0') {
								echo"Offline";
							}
							else{
								echo"Online";
							}


							 ?>

							</a></td>
							</tr>


<?php
					    $i++;
					   }
					}

					else{
						echo $date;
					    die(mysqli_error($con));
					   }

					?>										
					
				</tbody>
	
	
			</table>
	</div>

        </div> 
    
    </div>
</div>

			<!-- MODALS -->

			<!-- APPOINTMENT MODAL -->
<div class="popup" id="modal1" >
	<div class="container">
		<h5>Please select a Patient</h5>
			<div class="patient-list-container-inside">
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 70px;"> </th>
							<th>Name</th>
							<th>Appointment Date</th>
					   		<th>Time</th>
							   <th>Type</th>
							<th>Accept/Decline</th>
						</tr>
					</thead>
		
					<tbody>
							
							
						<?php 
						$doctorID = $_SESSION['user_id'];
						
						
						$select_query="Select * from `appointment`, `account` WHERE `doc_id` = '$doctorID' AND pat_id =acct_id ORDER BY `sched_date`";
							$result=mysqli_query($con,$select_query);
							
						$i=1;
						if($result)
						{
						   while ($row=mysqli_fetch_assoc($result)) 
						   {
						    $id=$row['acct_id'];
						     $surname=$row['last_name'];
						     $firstname=$row['first_name'];
						     $status=$row['status'];
						     $time=$row['sched_time'];
							 $date=$row['sched_date'];
					     	$typeapp=$row['typeapp'];
					     	$avatar=$row['avatar'];



						      
						     	?>

								<tr class='table'>
								<td><a data-toggle='#'><?php echo "
											<img src='./avatar/".$avatar."' style='width: 70px;'>"; ?></a></td>
								<td><a href='doctorViewToPatient.php?acct_id=<?php echo $row['acct_id'];?>&&date_id=<?php echo $row['sched_date'];?>'> <?php echo "$firstname $surname"; ?></a></td>
								<td><a href='#' onclick='patientModal1()' name="date"><?php echo"$date";?></a></td>
								<td><a href='#' onclick='patientModal1()' name="time"><?php echo"$time";?></a></td>
								<td><a href='#' onclick='patientModal1()' name="typeapp"><?php echo"$typeapp";?></a></td>
								<form method="post"><td><input type='submit' name='accept' class="btn btn-primary" value="Accept"/></form>
							
							</td>
								</tr>
<?php 
						    $i++;
						   }
						}

						else{
						    die(mysqli_error($con));
						   }
						   if (isset($_POST['accept'])) {
							$insertquery = "INSERT INTO `appointment_queue`(`doc_id`, `pat_id`, `sched_date`, `sched_time`, `typeapp`) VALUES ('$doctorID','$id','$date','$time','$typeapp')";
							$insertresult = mysqli_query($con,$insertquery);
							if($insertresult){
							$deletequery = "DELETE FROM `appointment` WHERE doc_id='$doctorID' AND pat_id='$id' AND sched_date='$date'";
							$deleteresult = mysqli_query($con,$deletequery);
							if($deleteresult){
								echo "<script> window.open('doctorDB.php', '_self')</script>";
							}

							}
							}
					
						?>	
					</tbody>
				</table>
	</div>
	<div class="blurbg">
		<a href="#" onclick="appointment()"> <button class="buttons" id="cancel">Cancel</button></a> 
	</div>
</div>
</div>


	<!--List of appointment -->
	<div class="popup" id="queue" >
	<div class="container">
		<h5>Please select a Patient</h5>
			<div class="patient-list-container-inside">
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 70px;"> </th>
							<th>Name</th>
							<th>Appointment Date</th>
					   		<th>Time</th>
							   <th>Type</th>
							<th>Accept/Decline</th>
						</tr>
					</thead>
		
					<tbody>
							
							
						<?php 
						$doctorID = $_SESSION['user_id'];
						
						
						$select_query="Select * from `appointment_queue`, `account` WHERE `doc_id` = '$doctorID' AND pat_id =acct_id   ORDER BY `sched_date`";
							$resultqueue=mysqli_query($con,$select_query);
							
						$i=1;
						if($resultqueue)
						{
						   while ($row=mysqli_fetch_assoc($resultqueue)) 
						   {
						    $id=$row['acct_id'];
						     $surname=$row['last_name'];
						     $firstname=$row['first_name'];
						     $status=$row['status'];
						     $time=$row['sched_time'];
							 $date=$row['sched_date'];
					     	$typeapp=$row['typeapp'];
					     	$avatar=$row['avatar'];



						      
						     	?>

								<tr class='table'>
								<td><a data-toggle='#'><?php echo "
											<img src='./avatar/".$avatar."' style='width: 70px;'>"; ?></a></td>
								<td><a href='doctorViewToPatient.php?acct_id=<?php echo $row['acct_id'];?>&&date_id=<?php echo $row['sched_date'];?>'> <?php echo "$firstname $surname"; ?></a></td>
								<td><a href='#' onclick='patientModal1()' name="date"><?php echo"$date";?></a></td>
								<td><a href='#' onclick='patientModal1()' name="time"><?php echo"$time";?></a></td>
								<td><a href='#' onclick='patientModal1()' name="typeapp"><?php echo"$typeapp";?></a></td>
								<form method="post"><td><input type='submit' name='cancel' class="btn btn-primary" value="Cancel Appointment"/></form>
							
							</td>
								</tr>
<?php 
						    $i++;
						   }
						}

						else{
						    die(mysqli_error($con));
						   }
						   if (isset($_POST['cancel'])) {
				
							$deletequery = "DELETE FROM `appointment_queue` WHERE doc_id='$doctorID' AND pat_id='$id' AND sched_date='$date'";
							$deleteresult = mysqli_query($con,$deletequery);
							if($deleteresult){
								echo "<script> window.open('doctorDB.php', '_self')</script>";
							}

							}
							
					
						?>	
					</tbody>
				</table>
	</div>
	<div class="blurbg">
		<a href="#" onclick="queue()"> <button class="buttons" id="cancel">Cancel</button></a> 
	</div>
</div>
</div>




	<!-- APPOINTMENT LOG MODAL -->
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

						

				<!-- Set Schedule -->

				
				<div class="popup4" id="modal4" >
				<div class="container4">
					<br>
				<h3>Set Schedule</h3>
				<div class="button-group">
					
					

	
	
		<form method="POST">
 			<?php 

 				if(isset($_POST['pass']))
 				{ 	$doctorID = $_SESSION['user_id'];
 					$dater = $_POST['dater'];
 					$timer = $_POST['timer'];


 					foreach ($timer as $time_sched) {
 						$sql2 = "INSERT INTO `doctors_availability` (doctor_id,avail_date, avail_time) VALUES ('$doctorID','$dater', '$time_sched')";
 					$resultar=mysqli_query($con,$sql2);
 					}

					
    
					 if($resultar){
					   echo "<script>alert ('Schedule Added!')  </script>";
					   echo "<script>window.open('doctorsProfileReal.php','_self')</script>";
				 
				 
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
	</form>
	




</div>
						</div>
						</div>
			
			
	<!--PATIENT PROFILE CARD-->

	<div class="patientA" id="patient1" >
		<div class="card-container">
				<div class="profile-box">

					<?php 

						if(isset($_GET['patient_id']))
					{
						$id = $_GET['patient_id'];
						$select_query="Select * from `patient` WHERE patient_id = $id";
						$result=mysqli_query($con,$select_query);

					}



				   while ($row=mysqli_fetch_assoc($result)) 
					   {
					     $surname=$row['last_name'];
					     $firstname=$row['first_name'];
					     $age=$row['age'];
					     $sex=$row['sex'];
					     $religion=$row['religion'];


					     /*PROFILE BUBBLE*/

					     echo"

							<img src='./images/profile.webp' class='profile-pic'>
							<h4>$firstname $surname</h4>
							<h6>$age $sex $religion</h6>
							<h6>Online</h6>
							<div class='profile-btn'>";

					   }
					 ?>


						
						<a href="#" onclick="patientModal1()"> 
							<button class="buttons" id="approvalCancel">Cancel</button>
						</a>
						<a href="doctorViewToPatient.php?patient_id=<?php echo $_GET['patient_id']?>" onclick="patientModal1()"> 
							<button class="buttons" id="approvalBtn">Appoint</button>
						</a>
					</div>
				</div>
	
		</div>
		</div>
	</div>
	</div>
</div>



<script src="./js/events.js"></script>
</body>

</html>

<?php
					}
					else {
						header('Location:login.php');
					}
?>

