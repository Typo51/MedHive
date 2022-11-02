<?php 

include('connect.php');



 


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>
 		
 	</title>
 </head>
 <body>
 
<?php 

   $select_query="Select * from `appointment`, `account` WHERE pat_id = acct_id";
    $result=mysqli_query($con,$select_query);

     while ($row=mysqli_fetch_assoc($result)) 
       {

      $pat_id=$row['pat_id'];
      $firstname=$row['first_name'];
      $lastname =$row['last_name'];
     }


     echo " You are now appointed, $firstname $lastname!";


 ?>


 </body>
 </html>