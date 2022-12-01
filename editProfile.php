<?php 

    include ('connect.php');
  include ('side.php');
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

        $sql_insert = "INSERT INTO `clinic_info`( `doc_clinic_id`, `clinic_address`, `office_days`, `office_time`, `contact_info`) VALUES ('$id', '$address', '$days', '$time', '$contact' )";
        $insert_query = mysqli_query($con, $sql_insert);

        if ($insert_query) {
       
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
        $time=htmlspecialchars($_POST['clinic_time']);
        $contact=htmlspecialchars($_POST['contact']);
        $about=htmlspecialchars($_POST['doc_about']);

        $sql_insert = "INSERT INTO `clinic_info`( `doc_clinic_id`, `clinic_address`, `office_days`, `office_time`, `contact_info`) VALUES ('$id', '$address', '$days', '$time', '$contact' )";
        $insert_query = mysqli_query($con, $sql_insert);

        if ($insert_query) {
       
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

    <link rel='stylesheet' type='text/css' href='css/patientsInfoForm.css'>

    <title>Patients Information Form</title>
</head>
<body>


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

</body>
</html>