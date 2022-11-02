<?php 
 include('connect.php');
 include('side.php');
 if($_SESSION['activeuser'] == true){
    // wala ka ibutang diri
}
else{
    header("location: login.php");
}
 
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>


</head>
<body>


<div class='welcome-bubble'>
				<h5>Welcome, <?php echo $_SESSION['user'];?> </h5>
    		</div>

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
						<th>Doctor's Name</th>
	   					
						<th>Specialization</th>
						<th>Status</th>
					</tr>
				</thead>
	
				<tbody>
					<?php 

$select_query="Select * from `account` WHERE acc_type = '1'";
$result=mysqli_query($con,$select_query);

$i=1;
if($result)
{
while ($row=mysqli_fetch_assoc($result)) 
{
$id=$row['acct_id'];
 $surname=$row['last_name'];
 $firstname=$row['first_name']
; $status=$row['status'];
 $specialty=$row['specialization'];
						 
					     
					     echo " 
					     
							<tr class='clickable'>
							<td><img src='./images/icon.png'  width='40px' height='40px'></a></td>
							<td>$firstname $surname</a></td>
							<td>$specialty</td>
							<td>Online</td>
							
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
		<form method="POST">
			<div class="patient-list-container-inside">
				<table class="list">
					<thead>
						<tr>
							<th style="width: 70px;"> </th>
							<th>Name</th>
							<th>Specialization</th>
						
						</tr>
					</thead>
		
					<tbody>
							
							<?php 

								
							     
								 $select_query="Select * from `account` WHERE acc_type = '1'";
						
						$result=mysqli_query($con,$select_query);
					$i=1;
					if($result)
					{
					   while ($row=mysqli_fetch_assoc($result)) 
					   {
					    $id=$row['acct_id'];
					     $surname=$row['last_name'];
					     $firstname=$row['first_name'];
					     $specialty=$row['specialization'];
						?>

							   
							     	
									<tr class='clickable'>
										<td><a data-toggle='#'><img src='./images/icon.png'  width='40px' height='40px'></a></td>
									<td><a href='doctorProfile.php?acct_id=<?php echo $row['acct_id']?>' onclick='doctorsModal1()''><?php echo " $firstname $surname"?></a></td>
										<td><a href='doctorProfile.php?acct_id=<?php echo $row['acct_id']?>' onclick='doctorsModal1()'><?php echo "$specialty" ?></a></td>
										
									</tr>
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
			</form>
		


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
				<a href="" target="blank" onclick="conference()"> 
					<button class="buttons" id="conference">Enter</button>
				</a>
			
			</div>
			

		</div>


	</div> 


	<!-- APPOINTMENT LOG MODAL -->
	<div class="popup3" id="modal3" >
	<div class="container">
	<div class="patient-list-container-outside">
			<table class="list">
				<thead>
					<tr>
						<th style="width: 70px;"> </th>
						<th>Doctor's Name</th>
	   					
						<th>Appointment Date</th>
						<th> Cancel Appointment</th>
						
					</tr>
				</thead>
	
				<tbody>

		<?php 
$patID = $_SESSION['acc_id'];
$select_query="Select * from `appointment` WHERE pat_id = '$patID'";
$result=mysqli_query($con,$select_query);

$i=1;
if($result)
{
while ($row=mysqli_fetch_assoc($result)) 
{

 $scheddate=$row['sched_date'];
 $schedtime=$row['sched_time'];
 $doctorfullname=$row['docfullname'];
 
						 
					     
 ?>
 <tr>
	 <td><img src="./images/icon.png" alt="" style="width:40px; height:40px"></td>
	 <td><?php echo $doctorfullname ?></td>
	 <td><?php echo $scheddate." ".$schedtime ?></td>
	 <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="cancel_appointment(<?php echo $row['transaction_id']; ?>)" >CANCEL</button></td>
	
 </tr>
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
		
	</div><br>
	<a href="#" onclick="logs()"> <button class="buttons" id="cancel">Cancel</button></a> 
					</div>


	
</body>
<script src="js/events.js">
	
		

	</script>
</html>



