<?php 
	include 'connect.php';
	session_start();

	$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
     
      $reason=$_POST['reason'];
      $symptoms=$_POST['symptoms'];
      $howLong=$_POST['how_long'];
      $better=$_POST['better'];
      $smoke=$_POST['smoke'];
      $drugs=$_POST['drugs'];
      $alcohol=$_POST['alcohol'];
      $history=$_POST['history'];
      $meds=$_POST['meds'];


    $sql= "INSERT INTO `consultation` (pat_cons_id, reason, symptoms, how_long, better, smoke, drugs, alcohol, history, meds) VALUES ('$user_id', '$reason', '$symptoms', '$howLong', '$better', '$smoke', '$drugs', '$alcohol', '$history', '$meds')";
    $selectresult=mysqli_query($con, $sql);
    if($result)
      {
        echo "<script>alert('Submitted')</script>";
        echo "<script> window.open('patientdb.php', '_self')</script>";
      }
}

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Symptoms Form
 	</title>

 	<link rel="stylesheet" type="text/css" href="css/symptomsForm.css">
 	<link rel="stylesheet" href="css/signupstyle.css">

 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 </head>
 <body>
 <div class="container my-5">
 	<div class="center">
 		<h4 style="margin: 20px">Consultation Form</h4>
 		<hr>
 	<form method="POST">
 		<div class="txt_field">
 		<input type="text" name="reason" placeholder="What brings you in today?" class="answerable">
 		</div>

 		<div class="txt_field">
 		<input type="text" name="symptoms" class="answerable" placeholder="What are your symptoms?">
 		</div>

 		<div class="txt_field">
 
 		<input type="text" name="how_long" class="answerable" placeholder="How long has this been going on?">
 		</div>

 		<div class="txt_field">
 		
 		<input type="text" name="better" class="answerable" placeholder="Has the pain been getting better or worse?">
 		</div>

 		<div class="txt_field">
 		<input type="text" name="smoke" class="answerable" placeholder="Do you smoke?">
 		</div>

 		<div class="txt_field">
 		<input type="text" name="drugs" class="answerable" placeholder="Do you take recreational drugs?">
 		</div>

		<div class="txt_field">
 		<input type="text" name="alcohol" class="answerable" placeholder="Do you drink alcohol and how often?">
 		</div>

 		<div class="txt_field">
 		<input type="text" name="history" class="answerable" placeholder="Do you have family history of this?">
		</div>

 		<div class="txt_field">
 		<input type="text" name="meds" class="answerable" placeholder="Do you take any medicines or supplements?">
 		</div>
 		<button type="submit" name="submit" >Submit</button>
 	</div>
 	</form>
</div>




 </body>
 </html>