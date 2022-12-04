<?php 

    include ('connect.php');

    session_start();
		
	$user_id = $_SESSION['user_id'];
	$type = $_SESSION['acc_type'];
   
   
	if(isset($_GET['acct_id']))
	{
		$id = $_GET['acct_id'];
		$select_query="Select * from `account` WHERE acct_id = $user_id";
		$result=mysqli_query($con,$select_query);
   
	   while ($row=mysqli_fetch_assoc($result)) 
		   {
   
			$id=$row['acct_id'];
			$firstname=$row['first_name'];
   
		 }
   
	}
  $user_id = $_SESSION['user_id'];
  
    if(isset($_SESSION['acct_id']))
    {
        $select_query="Select * from `doctor` WHERE doc_acc_id = $user_id";
        $result=mysqli_query($con,$select_query);

     $row=mysqli_fetch_assoc($result);
           
            $id=$row['doctor_id'];
            $acc_type = $row['type'];

    }

 
    if (isset($_POST['doctor_submit'])) {
        
        $address=htmlspecialchars($_POST['address']);
        $days=htmlspecialchars($_POST['clinic_days']);
        $time=htmlspecialchars($_POST['clinic_time']);
        $contact=htmlspecialchars($_POST['contact']);
        $about=htmlspecialchars($_POST['doc_about']);

        $update_clinic = "UPDATE `clinic_info` SET `clinic_address`='$address',`office_days`='$days',`office_time`='$time',`contact_info`='$contact' WHERE doc_clinic_id = $user_id";
        $update_clinic_query = mysqli_query($con, $update_clinic);

        if ($update_clinic_query) {
       
            $sql_update = "UPDATE `doctor` SET `bio`='$about' WHERE doc_acc_id = $user_id";
            $update_query = mysqli_query($con, $sql_update);

            if ($update_query) {
                echo "<script>alert('Changed Successful')</script>";
                
            }

        }
    }

    if (isset($_POST['patient_submit'])) {
        
        $patAddress=htmlspecialchars($_POST['pat_address']);
        $patAbout=htmlspecialchars($_POST['pat_about']);
        $weight=htmlspecialchars($_POST['weight']);
        $contact=htmlspecialchars($_POST['contact']);
        $height=htmlspecialchars($_POST['height']);

        $update_pat_info = "UPDATE `patient` SET `bio`='$patAbout',`address`='$patAddress',`contact_num`='$contact',`height`='$height',`weight`='$weight' WHERE pat_acc_id = $user_id";
        $query_update = mysqli_query($con, $update_pat_info);

        if ($query_update) {
       
            $sql_update = "UPDATE `doctor` SET `bio`='$about' WHERE doc_acc_id = $user_id";
            $update_query = mysqli_query($con, $sql_update);

            if ($update_query) {
                echo "<script>alert('Changed Successful')</script>";
                
            }

        }
    }


 ?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    ><link rel="stylesheet" href="css/sidebars.css">
    <link rel='stylesheet' type='text/css' href='css/patientsInfoForm.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Patients Information Form</title>
</head>
<body>
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Hi <?php 
if ($_SESSION['acc_type'] == 0){
   echo $_SESSION['user'];
}
else{
  echo 'Dr. ', $_SESSION['user'];
}
 ?>!</span>
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
            <li class="list">
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
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-bell icon"></i>
                <span class="link">Notifications</span>
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
              <a href="#" class="nav-link">
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

    <?php 


           $select_query="Select * from `account` WHERE acct_id = $user_id";
            $result=mysqli_query($con,$select_query);

            $row=mysqli_fetch_assoc($result);
            $acc_type = $row['type'];


        if($acc_type == '0')
        {
            echo '


  

    ';
    }
    ?>  


      <?php 


           $select_query="Select * from `account` WHERE acct_id = $user_id";
        $result=mysqli_query($con,$select_query);

            $row=mysqli_fetch_assoc($result);
            $acc_type = $row['type'];


        if($acc_type == '1')
        {
            echo "

            <div class='containerFluid'>
        <div class='header'> <h1> Doctor Information Form</h1>  </div> 
            <form method='POST'>
            
            <div class='wrapper'>

            <div class='infoContainer'>

                <div class='infoEntries'>
                    <div class='firstInputs'>
                        <div class='address'>
                        <h2>Account ID</h2>
                        <input type='text' value='$user_id' disabled>
                        <h2>Clinic Address</h2>
                        <input class='names' type='text' placeholder=' Exclude the City' name='address'>
                        </div>
                        <div class='divider'>
                            <div class='inputGroup'>
                                <h2>Office Days</h2>
                                <input class='datePicker' placeholder='Ex. Monday - Friday' type='text' name='clinic_days'>
                            </div>
                            <div class='inputGroup'>
                                <h2>Office Time</h2>
                                <input class='religion' type='text' placeholder='Ex. 8:00 AM - 5:00 PM' name='clinic_time'>
                            </div>
                        </div>
                    </div>
                    <div class='inputGroup'>
                        <h2>Office Contact Number</h2>
                        <input class='datePicker' placeholder='Ex. 09123456789' type='text' name='contact'>
                     <h2>About Me</h2>
                    <div class='aboutMe'>
                        <textarea class='about' name='doc_about'  placeholder=' Write Something About you' name='about'></textarea>
                    </div>
                    <input id='submit' type='submit' name='doctor_submit'>
                </div>
                    
            </div>
            </div>
        </form>
        </div>
   

    ";
    }
    ?>  
 


      <?php 


           $select_query="Select * from `account` WHERE acct_id = $user_id";
        $result=mysqli_query($con,$select_query);

            $row=mysqli_fetch_assoc($result);
            $acc_type = $row['type'];


        if($acc_type == '0')
        {
            echo "

          <div class='containerFluid'>
        <div class='header'> <h1> Patients Information Form</h1>  </div> 
            <form method='POST'>
            
            <div class='wrapper'>

            <div class='infoContainer'>

                <div class='infoEntries'>
                    <div class='firstInputs'>
                        <div class='address'>
                        <h2>Address</h2>
                        <input class='names' type='text' placeholder='Exclude the City' name='pat_address'>
                        </div>
                    </div>
                     <h2>About Me</h2>
                    <div class='aboutMe'>
                        <textarea class='about' name='pat_about' id=''  placeholder=' Write Something About you' name='pat_about'></textarea>
                    </div>
                    <div class='vitals'>
                        <input class='vita'type='text' placeholder=' Height' name='height'>
                        <input class='vita' type='text' placeholder=' Weight' name='weight'> 
                    </div>
                </div>
                    <input id='submit' type='submit' name='patient_submit'>
            </div>
            </div>
        </form>
        </div>
    </div>    
   

    ";
    }
    ?>  
<script type="text/javascript" src="js/events.js"></script>
</body>

</html>