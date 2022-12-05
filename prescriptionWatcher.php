<?php 

	include('connect.php');

	session_start();
$user_id = $_SESSION['user_id'];

	if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$date_id = $_GET['date_id'];

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title><?php echo"$date_id"; ?></title>
 </head>
 	<link rel="stylesheet" type="text/css" href="css/prescriptionWatcher.css">
 	<link rel="stylesheet" type="text/css" href="css/diagnosisPrescriptionForm.css">



 <body>






<div class="watcher-container">

<?php 

	$select_query="SELECT * FROM `account`,`clinic_info` WHERE doc_clinic_id = '$id' AND acct_id = $id";
	$result=mysqli_query($con,$select_query);

	while ($row=mysqli_fetch_assoc($result)) {
	
	$address = $row['clinic_address'];
	$contact = $row['contact_info'];
	$doctor = $row['last_name'];
	$firstname = $row['first_name'];
	echo "

	<div class='header'>
	<h4>
	Dr. $firstname $doctor
	</h4>
	</div>

	<div class='header'>
	<h4>
	$address
	</h4>
	</div>

	<div class='header'>
	<h4>
	City of Koronadal, South Cotabato, 9506
	</h4>
	</div>

	<div class='header'>
	<h4>
	$contact
	</h4>
	</div>";

}
 ?>

<hr width="100%">
		<h4>Prescription</h4>
			<div class="presc-table-contain">
			
			<table class="table-watcher" id="presc_id">
				<tbody id="table_body">
			<tr>
				<td><b>Medicine Name</b></td>
				<td><b>Milligrams</b></td>
				<td><b>Every hour</b></td>

			</tr>

			
<?php 


 
	$select_query="SELECT `med_name`, `milligrams`, `every_hour` FROM `prescription` WHERE pres_pat_id = '$user_id' AND $id = pres_doc_id AND '$date_id' = pres_sched_date";
	$result=mysqli_query($con,$select_query);

				while ($row=mysqli_fetch_assoc($result)) 
		   {

		 	$med_name=$row['med_name'];
			$mg=$row['milligrams'];
			$every_hour=$row['every_hour'];
		
					echo "
					<tr>
						<td class='inputRows'>
							$med_name
						</td>
						<td>
							$mg Mg per
						</td>
						<td>	
							$every_hour
							hours.
						</td>						
						



					";
}

				 ?>
		</tr>
		
				
		
</tbody>
</table>
			</div>
		</div>
 
 </body>
 </html>

  