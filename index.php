<?php
        include ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/42135a69b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
   

    <title>Document</title>
</head>
<body>
    <!-- navigation bar container -->
    <div class="nav-container">
        <div class="top-navbar">
            <div class="logo-content">
                <div class="logo">
                    <div class="logo-name"><img class ="img-logo" src="./images/medhive.png"></div>
                   <a href="#"> <i class="fa-solid fa-bars" id="btn" onclick="sidebar()"></i> </a>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar container -->
<div class="dashboard-container"   id="sbarContainer">
    <div class="sidebar">    
            <ul class="side-nav-list">
                <li>
                    <i class="fa-solid fa-magnifying-glass" id="searchBtn" onclick="search()"></i>
                    <input type="text" placeholder="Search..."></a>
                    <div class="hover-container">
                        <span class="tool-tip">Search</span>
                     </div>
                </li>
                <li>
                    <a href  = "dashboard.php">
                        <i class="fa-solid fa-border-all"></i>
                        <span class="links-name">Dashboard</span>
                    </a>
                    <div class="hover-container">
                    <span class="tool-tip">View Dashboard</span>
                 </div>
                </li>
                <li>
                   <a href = "#" >
                     <i class="fa-regular fa-user" ></i>
                        <span class="links-name">Profile</span>            
                    </a>
                    <div class="hover-container">
                        <span class="tool-tip">View Profile</span>
                    </div>
                </li>
                <li>
                    <a href = "#">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="links-name">Logout </i></span>
                    </a>
                    <div class="hover-container">
                    <span class="tool-tip">Logout  </i></span>
                </div>
                </li>
            </ul>
        </div>
        <div class="container-body" id="body-container">
          
        </div>
    </div>
</div>
</div>



</body>
<script src="./js/navigationEvents.js"></script>
</html>

