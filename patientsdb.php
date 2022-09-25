<?php 
 include('connect.php');
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patient's Dashboard</title>
	<link rel="stylesheet" href="./css/patientsdb.css">
	<link rel="stylesheet" href="./css/buttons.css">
	<link rel="stylesheet" href="./css/modals.css">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>


</head>
<body>


	<!-- WELCOME BUBBLE -->

	<?php 

	$select_query="Select first_name from `patient` WHERE id LIKE 2";
	$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
	   {
	     $firstname=$row['first_name'];

	     /*PROFILE BUBBLE*/

	     echo " 
	   
	    	<div class='welcome-bubble'>
				<h5>Welcome, $firstname </h5>
    		</div>";

	   }
?>


    <!-- ABOVE BUTTONS TO OPEN MODALS -->

    <div class="main_content">
        <div class="header">
        	<div>
        		<a href="#" onclick="appointment()"> <button class="waves-effect waves-light btn">Set an appointment</button></a> 
        	</div>
	
        	<div>
				<a href="#" onclick="conference()"> <button class="waves-effect waves-light btn">Join a conference</button></a> 
        	</div>
        	
        	<div>
				<a href="#" onclick="logs()"> <button class="waves-effect waves-light btn">Appointment Logs</button></a> 
        	</div>
        	</a>
        </div>

        <!-- DOCTORS LIST -->
        
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

						$select_query="Select * from `doctor` WHERE status = 1";
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

			<!-- SELECT DOCTOR MODAL -->
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

								$select_query="Select * from `doctor` WHERE status = 1";
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
										<td><a data-toggle='#' onclick='doctorsModal1()'><img src='./images/profile.webp'  width='40px' height='40px'></a></td>
										<td><a href='#' onclick='doctorsModal1()''>$firstname $surname</a></td>
										<td><a href='#' onclick='doctorsModal1()'>11:35 AM</a></td>
										<td><a href='#' onclick='doctorsModal1()'>Online</a></td>
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
	<div class="blurbg">
		<a href="#" onclick="appointment()"> <button class="buttons" id="cancel">Cancel</button></a> 
	</div>
	</div>
</div>


	<!-- CONFERENCE MODAL -->
 <div class="popup2" id="modal2">
		<div class="conference-container">
			<div class = "conference-box">
				<label class="labeling">Please input the Conference ID or Link</label>
				<input type="link" name="url">
				<a href="#" onclick="conference()"> 
					<button class="buttons" id="conference">Enter</button>
				</a>
			
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
		<a href="#" onclick="logs()"> <button class="buttons" id="cancel">Cancel</button></a> 
	</div>
</div>


	<!--SET APPOINTMENT MODAL-->

	<div class="doctorA" id="doctor1" >
        <form method="POST">
            <div class="appointment-wrapper">
                <label>Select a schedule</label>
                    <input type="date" name="schedule">
                    <input type="time" name="time">
                <br>
                <label>Type of consultation</label>
                    <select class="dropdown-trigger btn">
                        <option>Face to face</option>
                        <option>Virtual</option>
                    </select>
                <br>
				<div class="profile-btn">
						
					<a href="#" onclick="doctorsModal1()"> 
						<button class="buttons" id="approvalCancel">Cancel</button>
					</a>
					<a href="#" onclick="doctorsModal1()"> 
						<button class="buttons" id="approvalBtn">Appoint</button>
					</a>
				</div>
            </div>
        </form>
	</div>






	<script src="./js/events.js"></script>
</body>
</html>



