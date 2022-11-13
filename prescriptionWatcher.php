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
 	<title></title>
 </head>
 	<link rel="stylesheet" type="text/css" href="css/diagnosisPrescriptionForm.css">


 <body>

<div class="prescriptionContainer">
		<h4>Prescription</h4>
			<div class="prescription">
			
			<table class="prescTable" id="presc_id">
				<tbody id="table_body">
			<tr>
<?php 


 
	$select_query="Select * from `account`, `diagnosisPrescription` WHERE pres_pat_id = '$user_id' AND acct_id = pres_doc_id AND '$date_id' = pres_sched_date";
	$result=mysqli_query($con,$select_query);

				while ($row=mysqli_fetch_assoc($result)) 
		   {

		 	$med_name=$row['med_name'];
			$mg=$row['milligrams'];
			$every_hour=$row['every_hour'];
		
					echo "
						<td class='inputRows'>
							$med_name
							$mg <span> Mg per</span>  </input>
							$every_hour
							<span> hours. </span>
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