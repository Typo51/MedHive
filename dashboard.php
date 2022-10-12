<?php
        include ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/doctorDB.css">
	<link rel="stylesheet" href="./css/buttons.css">
	<link rel="stylesheet" href="./css/modals.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   

    <title>Document</title>
</head>
<body>
    <!-- navigation bar container -->
    <div class="nav-container">
        <div class="top-navbar">
            <div class="logo-content">
                <div class="logo">
                    <div class="logo-name"><img class ="img-logo" src="./images/medhive.png"></div>
                   <a href="#"> <i class="fa-solid fa-bars" id="btn" onclick="sidebar()"></i> </a>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar container -->
<div class="dashboard-container"   id="sbarContainer">
    <div class="sidebar">    
            <ul class="side-nav-list">
                <li>
                    <i class="fa-solid fa-magnifying-glass" id="searchBtn" onclick="search()"></i>
                    <input type="text" placeholder="Search..."></a>
                    <div class="hover-container">
                        <span class="tool-tip">Search</span>
                     </div>
                </li>
                <li>
                    <a href  = "dashboard.php">
                        <i class="fa-solid fa-border-all"></i>
                        <span class="links-name">Dashboard</span>
                    </a>
                    <div class="hover-container">
                    <span class="tool-tip">View Dashboard</span>
                 </div>
                </li>
                <li>
                   <a href = "#" >
                     <i class="fa-regular fa-user" ></i>
                        <span class="links-name">Profile</span>            
                    </a>
                    <div class="hover-container">
                        <span class="tool-tip">View Profile</span>
                    </div>
                </li>
                <li>
                    <a href = "#">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="links-name">Logout </i></span>
                    </a>
                    <div class="hover-container">
                    <span class="tool-tip">Logout  </i></span>
                </div>
                </li>
            </ul>
        </div>
        <div class="container-body" id="body-container">
          
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
					    $id=$row['patient_id'];
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
						    $id=$row['patient_id'];
						     $surname=$row['last_name'];
						     $firstname=$row['first_name'];
						     $status=$row['status'];
						     $contain = $id;

						      
						     	?>

								<tr class='clickable'>
								<td><a data-toggle='#' onclick='patientModal1()'><img src='./images/profile.webp'  width='40px' height='40px'></a></td>


								<td><a href='patientview.php?patient_id=<?php echo $row['patient_id']?>#' onclick='patientModal1()'> <?php echo "$firstname $surname"; ?></a></td>

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




        </div>
    </div>
</div>
</div>



</body>
<script src="./js/events.js"></script>
<script src="./js/navigationEvents.js"></script>
</html>

