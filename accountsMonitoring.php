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
	<link rel = "stylesheet" href="./css/accountsMonitoring.css">
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
 </head>
 <body>
 	<div class="container">
 		<div class="doctor-container">

            <div class= searchContainer>
            	<form method="GET">
            <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search" name="search">
                 <button type="submt" name="submit">Search</button>
             </form>
               
            </div>


 			<table class="list">
					<thead>              
						<tr>
                            <th>Account ID</th>
							<th>Last Name</th>
							<th> First Name</th>
							<th>Account Type</th>
                            <th>operations</th>
						</tr>
					</thead>
		
					<tbody>
							
							<?php 

							/*IF MAY GI SEARCH AMO LANG NI MAG APPEAR*/	
					
					  $id = "";
					  if(isset($_GET['submit']))
					  {

					    $id = $_GET['search'];

					    $sql = "SELECT * from `account` WHERE last_name = '$id' OR acct_id = '$id'";
					    $result = mysqli_query($con, $sql);

					    if($result){
					    	while($row = mysqli_fetch_array($result)){
					    		$id = $row['acct_id'];
					    		$surname = $row['last_name'];
					    		$fname = $row['first_name'];
					    		$type = $row['acc_type'];

					    		echo '<tr>
									    <th scope="row">'.$id.'</th>
									    <td>'.$surname.'</td>
									    <td>'.$fname.'</td>
									    <td>'.$type.'</td>
									    <td>UPDATE</td>';

					    	}
					    }

					  }

					  /*IF WALA MAY GI SEARCH AMO NI MAG APPEAR BY DEFAULT*/
					  
					else{
					$select_query="Select * from `account`";
						
						$result=mysqli_query($con,$select_query);
					$i=1;
					if($result)
						
					{
					   while ($row=mysqli_fetch_assoc($result)) 
					   {
					    $id=$row['acct_id'];
					     $surname=$row['last_name'];
					     $firstname=$row['first_name'];
					     $type=$row['acc_type'];
						?>

							   
							     	
									<tr class='clickable'>
										<td><a href='#.php?screen_acct_id=<?php echo $row['screen_acct_id']?>'><?php echo "$id"?></a></td>

										<td><a href='doctorVerification.php?screen_acct_id=<?php echo $row['screen_acct_id']?>'><?php echo "$surname"?></a></td>

										<td><a href='doctorVerification.php?screen_acct_id=<?php echo $row['screen_acct_id']?>'><?php echo "$firstname"?></a></td>

										<td><a href='doctorVerification.php?screen_acct_id=<?php echo $row['screen_acct_id']?>'><?php echo "$type"?></a></td>

										<td><a href='doctorVerification.php?screen_acct_id=<?php echo $row['screen_acct_id']?>' type="button">Update</a></td>
										
									</tr>
							<?php
							    $i++;
							   }
							}

							else{
							    die(mysqli_error($con));
							   }


							     if(isset($_GET['submit'])){





							     }
							 }

							?>
						





					</tbody>
				</table>
				<a href="admindb.php" style="color: black;">Go Back</a>
				<a href="accountsMonitoring.php" style="color: black; margin-left: 30px;">Cancel</a>
			</div>

 	</div>
 </body>
 </html>