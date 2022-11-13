<?php 

	include('connect.php');
	session_start();

$doctorID= $_SESSION['user_id'];
if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$date_id = $_GET['date_id'];

		$select_query="Select * from `account` WHERE acct_id = $id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {

		 	$id=$row['acct_id'];
			$firstname=$row['first_name'];
			$last_name=$row['last_name'];
		 }

	}

   if(isset($_POST['upload']))
  {
    $diagnosis = $_POST['diagnosis'];
    $med_name = $_POST['med_name'];
    $mg = $_POST['mg'];
    $every_hour = $_POST['every_hour'];


    $sql1 = "INSERT INTO `diagnosisprescription`(`pres_doc_id`, `pres_pat_id`, `pres_sched_date`, `diagnosis`) VALUES ('$doctorID','$id', '$date_id', '$diagnosis')";

    $sql2 = "INSERT INTO `document_sessions`(`sess_doc_id`, `sess_pat_id`, `sess_sched_date`) VALUES ('$doctorID','$id', '$date_id')";

	$result2=mysqli_query($con,$sql2);
	$result1=mysqli_query($con,$sql1);

	if ($result1) {
		

    $array = array_merge($med_name, $mg, $every_hour);
	$counter = sizeof($med_name);

		for ($i=0; $i<$counter; $i++) {
			$medicine = $med_name[$i];
			$milligrams = $mg[$i];
			$hour = $every_hour[$i];
			

				$sql = "INSERT INTO `diagnosisprescription`(`pres_doc_id`, `pres_pat_id`, `pres_sched_date`, `med_name`, `milligrams`, `every_hour`) VALUES ('$doctorID','$id', '$date_id', '$medicine', '$milligrams', '$hour')";
				$result=mysqli_query($con,$sql);
			}
		

	if ($result) {
  		echo "<script>alert('Upload Successful')</script>";
		
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
		<h3><?php echo "$firstname $last_name"; ?></h3>
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
				<input class="input1" name="med_name[]" placeholder="Medicine Name">  </input>
				<input class="input2" name="mg[]" placeholder="Ex. 50"> <span> Mg per</span>  </input>
				<input class="input2" name="every_hour[]" placeholder="4hrs."> </input>
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