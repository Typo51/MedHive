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


 
	$select_query="SELECT * FROM `diagnosis` WHERE diag_pat_id = '$user_id' AND $id = diag_doc_id AND '$date_id' = diag_sched_date";
	$result=mysqli_query($con,$select_query);

				while ($row=mysqli_fetch_assoc($result)) 
		   {

		 	$diagnosis=$row['diagnosis'];
		
					echo "
						<td class='inputRows'>
							$diagnosis
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

  