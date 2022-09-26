<?php 

	include ('connect.php');


	session_start();


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

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>


</head>
<body>






    <!-- ABOVE BUTTONS TO OPEN MODALS -->

    <div class="main_content">
        <div class="header">
        	<div>
        		<a href="#" onclick="appointment()"> <button class="waves-effect waves-light btn">Accept an Appointment</button></a> 
        	</div>
        	<div>
				<a href="#" onclick="logs()"> <button class="waves-effect waves-light btn">Appointment Logs</button></a> 
        	</div>
        	</a>
        </div>

        <!-- PATIENT LISTS -->
        
    
        <div class="patient-list-container-outside">
			<table class="list">
				<thead>
					<tr>
						<th style="width: 70px;"> </th>
						<th>Name</th>
						<th>Appointment Schedule</th>
						<th>Status</th>
					</tr>
				</thead>
	
				<tbody>
						
					<?php 

						$select_query="Select * from `patient` WHERE status = 1";
						$result=mysqli_query($con,$select_query);
					$i=1;
					if($result)
					{
					   while ($row=mysqli_fetch_assoc($result)) 
					   {
					    $id=$row['id'];
					     $surname=$row['last_name'];
					     $firstname=$row['first_name'];
					     $status=$row['status'];
					     
					     echo " 
					     
							<tr class='clickable'>
							<td><img src='./images/profile.webp'  width='40px' height='40px'></a></td>
							<td>$firstname $surname</a></td>
							<td>11:35 AM</a></td>
							<td>Online</a></td>
							</tr>";

					    $i++;
					   }
					}

					else{
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
		<h5>Please select a Doctor</h5>
			<div class="patient-list-container-inside">
				<table class="list">
					<thead>
						<tr>
							<th style="width: 70px;"> </th>
							<th>Name</th>
							<th>Appointment Schedule</th>
							<th>Status</th>
						</tr>
					</thead>
		
					<tbody>
							
							
						<?php 

							$select_query="Select * from `patient` WHERE status = 1";
							$result=mysqli_query($con,$select_query);
						$i=1;
						if($result)
						{
						   while ($row=mysqli_fetch_assoc($result)) 
						   {
						    $id=$row['id'];
						     $surname=$row['last_name'];
						     $firstname=$row['first_name'];
						     $status=$row['status'];
						     $contain = $id;

						      
						     	?>

								<tr class='clickable'>
								<td><a data-toggle='#' onclick='patientModal1()'><img src='./images/profile.webp'  width='40px' height='40px'></a></td>


								<td><a href='doctorDB.php?id=<?php echo $row['id']?>#' onclick='patientModal1()'> <?php echo "$firstname $surname"; ?></a></td>

								<td><a href='#' onclick='patientModal1()'>11:35 AM</a></td>
								<td><a href='#' onclick='patientsModal1()'>Online</a></td>
								</tr>;
<?php 
						    $i++;
						   }
						}

						else{
						    die(mysqli_error($con));
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
		</a>
	</div>
</div>


	<!--PATIENT PROFILE CARD-->

	<div class="patientA" id="patient1" >
		<div class="card-container">
				<div class="profile-box">

					<?php 

						if(isset($_GET['id']))
					{
						$id = $_GET['id'];
						$select_query="Select * from `patient` WHERE id = $id";
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
						<a href="doctorViewToPatient.php?id=<?php echo $_GET['id']?>" onclick="patientModal1()"> 
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


