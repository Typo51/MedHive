<?php 

	include('connect.php');
 ?>





 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Admin Dashboard
 	</title>

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel = "stylesheet" href="./css/verification.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
 </head>
 <body>
 	<div class="container">
 		<!-- DOCTOR APPLICANTS -->
 		<div class="doctor-container">
 			<table class="list">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Specialization</th>
							
						
						</tr>
					</thead>
		
					<tbody>
							
							<?php 

								 $select_query="Select * from `screening` WHERE acc_type = '1'";
						
						$result=mysqli_query($con,$select_query);
					$i=1;
					if($result)
						
					{
					   while ($row=mysqli_fetch_assoc($result)) 
					   {
					    $id=$row['screen_acct_id'];
					     $surname=$row['last_name'];
					     $firstname=$row['first_name'];
					     $specialty=$row['specialization'];
						?>

							   
							     	
									<tr class='clickable'>
										<td><a href='doctorVerification.php?screen_acct_id=<?php echo $row['screen_acct_id']?>'><?php echo "$id"?></a></td>

									<td><a href='doctorVerification.php?screen_acct_id=<?php echo $row['screen_acct_id']?>' onclick='doctorsModal1()'><?php echo " $firstname $surname"?></a></td>

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
				<a href="admindb.php" style="color: black;">Go Back</a>
			</div>



 	</div>
 </body>
 </html>