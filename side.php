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
 ?>



<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"> </script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/styleside.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

            
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a 
<?php 

                            

                            if ($_SESSION['acc_type'] == 0){
                                echo "href='patientsDB.php?acct_id=$user_id'";
                            }
                            else{
                            
                                echo "href='doctorDB.php?acct_id=$user_id'";
                            }

 ?>




                        >
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a 

                        <?php 

                            if($type == 1){


                                echo "href='doctorsProfileReal.php?acct_id=$user_id'";

                            }

                            elseif($type == 0){
                                echo "href='patientProfile.php?acct_id=$user_id'";
                            }
                         ?>
                        >
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Preferences</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li id ="logout" class="">
                    
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                  
                </li>

                
                
            </div>
        </div>

    </nav>

   

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , ()=>{
    sidebar.classList.toggle("close");
})


document.getElementById('logout').addEventListener('click', ()=>{
    console.log("here")
    $.ajax({
    url: "logout-process.php",
    method: "POST",
    dataType: 'json',
    data: {
        logoutAcc: 1
    },
    success: function(response){
        console.log(response);
        if (response.status){
            window.location.replace("login.php");
        }
    }
})
})


    </script>

</body>
</html>
