<?php 

    include ('connect.php');
    session_start();

    $user_id = $_SESSION['user_id'];
    $type = $_SESSION['acc_type'];


    if(isset($_GET['acct_id']))
    {
        $id = $_GET['acct_id'];
       
    }
 ?>



<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/sidebars.css">
  <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <!-- BOOTSTRAP -->
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>
<body>

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
</body>
</html>
