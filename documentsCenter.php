<?php 

	include ('connect.php');
  session_start();

  ob_start();


		
	$user_id = $_SESSION['user_id'];
	$type = $_SESSION['acc_type'];
   
   


	if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$select_query="Select * from `account` WHERE acct_id = $id";
		$result=mysqli_query($con,$select_query);

	   while ($row=mysqli_fetch_assoc($result)) 
		   {

		 	$id=$row['acct_id'];
			$firstname=$row['first_name'];
		 }

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Documents Center
	</title>
	<link rel="stylesheet" type="text/css" href="./css/dropdown.css">
	<link rel="stylesheet" type="text/css" href="css/recordsCenter.css">
  <link rel="stylesheet" href="./css/sidebars.css">


	 	<!-- BOOTSTRAP -->
 
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <link rel="stylesheet" href="./css/sidebars.css">
  <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="margin-left: 65px;">
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Hi <?php echo $_SESSION['user']; ?>!</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">MedHive</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a <?php 

                            

if ($_SESSION['acc_type'] == 0){
    echo "href='patientsDB.php?acct_id=$user_id'";
}
else{

    echo "href='doctorDB.php?acct_id=$user_id'";
}

?> class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Dashboard</span>
              </a>
            </li>
            <li class="list" >
              <a 
                        <?php 

                            if($type == 1){


                                echo "href='doctorsProfileReal.php?acct_id=$user_id'";

                            }

                            elseif($type == 0){
                                echo "href='patientProfile.php?acct_id=$user_id'";
                            }
                         ?>class="nav-link">
              <i class="bx bx-user icon" ></i>
                <span class="link">Profile</span>
              </a>
            </li>
            <li class="list" onclick="confirmPw()">
              <a <?php 


if (isset($_POST['confirm'])) {
  
  $password = $_POST['password'];


   $sql = "SELECT * FROM account WHERE acct_id = $user_id AND password ='$password'";
  $result = mysqli_query($con, $sql);

  if ($result->num_rows > 0) {

    header ("Location: documentsCenter.php?acct_id=$user_id");
    ob_end_flush();


  }

  else {
            echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
        }

}

 


 ?> class="nav-link">
               <i class='bx bx-folder-open icon' ></i>
                <span class="link">Files</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-message-rounded icon"></i>
                <span class="link">Messages</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Analytics</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-heart icon"></i>
                <span class="link">Likes</span>
              </a>
            </li>
            <li class="list">
              <a href="#"  class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">Files</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">Settings</span>
              </a>
            </li>
			<li class="list" id ="logout">
              <a href="#" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>
	
	<section class="overlay"></section>

<div class="doc-container">
	<div class="nav">
		<h4><?php echo "$firstname"; ?>'s Documents</h4>
	</div>


   		

      <!-- LISTS OF DOCTOR DOCUMENTS -->


<div class="folder-container">
        <?php

          $select_query="Select * from `account`, `prescription` WHERE pres_pat_id = $id AND acct_id = pres_doc_id GROUP BY pres_doc_id";

          $result=mysqli_query($con,$select_query);
          $i=1;
           if($result){
             while ($row=mysqli_fetch_assoc($result)){
              $firstname=$row['first_name'];
              $lastname= $row['last_name'];

              ?>
             <a href='documentsWatcher.php?passer_id=<?php echo $row['acct_id']?>' class='waves-effect waves-light btn'>
              <?php echo " Dr. $firstname $lastname </a> <br>";
              }
              }
              $i++;
          ?>

          
</div>


<div class="main-cards">
  
<?php 

    $select_query="Select * from `account`, `image` WHERE pat_img_id = $id AND acct_id = doc_img_id GROUP BY doc_img_id";


 if($result){
             while ($row=mysqli_fetch_assoc($result)){




             }
           }
 


echo "
  <div class='card'><a href='recordsLab.php?acct_id=$user_id' class='waves-effect waves-light btn'> Lab Results </a></div>
  <div class='card'><a href='recordsMedCert.php?acct_id=$user_id' class='waves-effect waves-light btn'> Medical Certificates </a></div>
  <div class='card'><a href='recordsOthers.php?acct_id=$user_id' class='waves-effect waves-light btn'> Other Records </a></div> 

";
?>

</div>
 	</div>
   <script type="text/javascript" src="js/events.js"></script>
</body>
</html>