<?php 
 include('connect.php');
 include('side.php');


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
	<link rel="stylesheet" href="./css/sidebars.css">


	<!-- BOOTSTRAP -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>


</head>
<body>


<div class='welcome-bubble'>
				<h5>Welcome, <?php echo $_SESSION['user'];?> </h5>
    		</div>

    <!-- ABOVE BUTTONS TO OPEN MODALS -->

    <div class="main_content">
        <div class="header">
        	<div class="appt">
        		<a href="#" onclick="appointment()"> <button class="btn btn-primary">Set an appointment</button></a> 
        	</div>
	
     
        	<div class="appt">
				<a href="#" onclick="logs()"> <button class="btn btn-primary">Appointment Logs</button></a> 
        	</div>
        	</a>
        </div>

        <!-- DOCTORS LIST -->
        
        <div class="patient-list-container-outside">
			<table class="table table-hover">
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

$select_query="Select * from `account`, `doctor` WHERE type = '1' AND acct_id = doc_acc_id";
$result=mysqli_query($con,$select_query);

$i=1;
if($result)
{
while ($row=mysqli_fetch_assoc($result)) 
{
 $last_name=$row['last_name'];
 $first_name=$row['first_name'];
 $status=$row['status'];
 $specialty=$row['specialization'];
 $avatar=$row['avatar'];
						 
					     
					     echo " 
					     
							<tr class='clickable'>
							<td><img src='./avatar/".$avatar."' style='width: 70px;'></td>
							<td>$first_name $last_name</a></td>
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
				<table class="table table-striped">
					<thead>
						<tr>
							<th style="width: 70px;"> </th>
							<th>Name</th>
							<th>Specialization</th>
						
						</tr>
					</thead>
		
					<tbody>
							
							<?php 

								
							     
								 $select_query="Select * from `account`, `doctor` WHERE type = '1' AND acct_id = doc_acc_id";
						
						$result=mysqli_query($con,$select_query);
					$i=1;
					if($result)
					{
					   while ($row=mysqli_fetch_assoc($result)) 
					   {
					     $last_name=$row['last_name'];
					     $first_name=$row['first_name'];
					     $specialty=$row['specialization'];

						?>

							   
							     	
									<tr class='clickable'>
										<td><?php echo "<img src='./avatar/".$avatar."' style='width: 70px;'>"; ?></td>
									<td><a href='doctorProfile.php?acct_id=<?php echo $row['acct_id']?>' onclick='doctorsModal1()'><?php echo " $first_name $last_name"?></a></td>
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
	
		<a href="#" onclick="appointment()"> <button class="btn btn-primary" id="cancel">Cancel</button></a> 
		

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
			<table class="table table-striped">
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
$patID = $_SESSION['user_id'];
$select_query="Select * from `appointment`,`account` WHERE pat_id = '$patID' AND acct_id=doc_id";
$result=mysqli_query($con,$select_query);

$i=1;
if($result)
{
while ($row=mysqli_fetch_assoc($result)) 
{

 $scheddate=$row['sched_date'];
 $schedtime=$row['sched_time'];
 $doctorfname=$row['first_name'];
 $doctorlname=$row['last_name'];
						 
					     
 ?>
 <tr>
	 <td><img src="./images/icon.png" alt="" style="width:40px; height:40px"></td>
	<td><?php echo $doctorfname." ".$doctorlname ?></td>
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



