<?php 

	include('connect.php');

	session_start();

$user_id= $_SESSION['user_id'];
if(isset($_GET['passer']))
	{
		$id = $_GET['passer'];
		$date_id = $_GET['date_id'];

		$select_query="Select * from `account` WHERE acct_id = $id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {
			$first_name=$row['first_name'];
			$last_name=$row['last_name'];
		 }

	}

   if(isset($_POST['upload']))
  {
    $diagnosis = htmlspecialchars($_POST['diagnosis']) ;
    $med_name = $_POST['med_name'];
    $mg = $_POST['mg'];
    $every_hour = $_POST['every_hour'] ;


    $sql1 = "INSERT INTO `diagnosis`(`diag_doc_id`, `diag_pat_id`, `diag_sched_date`, `diagnosis`) VALUES ('$user_id','$id', '$date_id', '$diagnosis')";

    $sql2 = "INSERT INTO `document_sessions`(`sess_doc_id`, `sess_pat_id`, `sess_sched_date`) VALUES ('$user_id','$id', '$date_id')";

	$result2=mysqli_query($con,$sql2);
	$result1=mysqli_query($con,$sql1);

	if ($result1) {
		

    $array = array_merge($med_name, $mg, $every_hour);
	$counter = sizeof($med_name);

		for ($i=0; $i<$counter; $i++) {
			$medicine = htmlspecialchars($med_name[$i]);
			$milligrams = htmlspecialchars($mg[$i]);
			$hour = htmlspecialchars($every_hour[$i]);
			

				$sql = "INSERT INTO `prescription`(`pres_doc_id`, `pres_pat_id`, `pres_sched_date`, `med_name`, `milligrams`, `every_hour`) VALUES ('$user_id','$id', '$date_id', '$medicine', '$milligrams', '$hour')";
				$result=mysqli_query($con,$sql);
			}
		

	if ($result) {

			$reference = "Select * from `appointment` WHERE doc_id = $user_id and pat_id = $id and sched_date";
			$ref_result = mysqli_query($con, $reference);

			$row=mysqli_fetch_assoc($ref_result);
			$time=$row['sched_time'];
			$type=$row['type'];
		 
			$log_sql = "INSERT INTO `appointment_log` (doc_id, pat_id, sched_date, sched_time, `app_type`) VALUES ( '$user_id','$id', '$date_id', '$time', '$type')";
			$query_log = mysqli_query($con, $log_sql);


			$delete_sql = "DELETE FROM `appointment` WHERE pat_id = $id AND sched_date = '$date_id'";
			$result_del=mysqli_query($con,$delete_sql);

			if ($result_del) {
  		echo "<script>alert('Upload Successful')</script>";
  		echo "<script>window.open('doctorDB.php','_self')</script>";

			}
  		
		
	}
}
	
}



 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Diagnosis and Prescriptions
 	</title>
 	<link rel="stylesheet" type="text/css" href="css/diagnosisPrescriptionForm.css">
 </head>
 <body>
 
<form method="POST">
<div class="containerFluid">
	<div class="nameHeader">
		<h3><?php echo "$first_name $last_name"; ?></h3>
	</div>
	<div class="wrapper">
		<div class="diagContainer">
		<div class="diagnosis">
			<h4>Diagnosis</h4>
				<textarea name="diagnosis"></textarea>
			</div>

		<div class="diagSubmit">
				<input type="submit" class="diagSubmitBtn" name="upload">
			</div>
		</div>
		
		
		<div class="prescriptionContainer">
		<h4>Prescription</h4>
			<div class="prescription">
			
			<table class="prescTable" id="presc_id">
				<tbody id="table_body">
			<tr>
				<td class="inputRows">
				<input type="text" class="input1" name="med_name[]" placeholder="Medicine Name">  </input>
				<input type="number" class="input2" name="mg[]" placeholder="Ex. 50"> <span> Mg per</span>  </input>
				<input type="number" class="input2" name="every_hour[]" placeholder="4hrs."> </input>
				<span> hours. </span>
			</td>
		</tr>
		
				
		
</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</form>
<button class="addRow" onclick= "create_tr('table_body')"> + </button>

</body>
<script src="js/diagnosisEvents.js"></script>