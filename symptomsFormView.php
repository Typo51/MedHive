<?php 
	include 'connect.php';

    $sql= "Select * From `consultation`, `account` Where pat_cons_id = acct_id";
    $selectresult=mysqli_query($con, $sql);
    while ($row=mysqli_fetch_assoc($selectresult))
    {
      $reason=$row['reason'];
      $symptoms=$row['symptoms'];
      $howLong=$row['how_long'];
      $better=$row['better'];
      $smoke=$row['smoke'];
      $drugs=$row['drugs'];
      $alcohol=$row['alcohol'];
      $history=$row['history'];
      $meds=$row['meds'];
      $firstname = $row['first_name'];
      $lastname = $row['last_name'];
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
 		<h4 style="margin: 20px"><?php echo "$firstname $lastname" ?></h4>
 		<hr>
 	<form method="POST">
 		<div class="txt_field">
 		<p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$reason"; ?></p>
 		</div>

 		<div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$symptoms"; ?></p>
  </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$howLong"; ?></p>
     </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$better"; ?></p>
     </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$smoke"; ?></p>
     </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$drugs"; ?></p>
     </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$alcohol"; ?></p>
     </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$history"; ?></p>
     </div>

    <div class="txt_field">
    <p type="text" name="reason" placeholder="What brings you in today?" class="answerable"><?php echo"$meds"; ?></p>
    </div>
 	</div>
</div>




 </body>
 </html>