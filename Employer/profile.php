<?php

include('config.php');
session_start();
$pro_pic= $_SESSION['profile_pic'];
$cover_pic= $_SESSION['cover_pic'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>Profile</title>
</head>
<body>
    <div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
          <a href="jobseekers.php">Job Sekkers</a>
          <a href="company.php">Company's</a>

          <img src="../images/company1.png" onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%" > 
        
          <div class="sub-menu-wrap" id="subMenu">

            <div class="sub-menu">
                 <div class="user-info">
                    <img src="../<?php echo $pro_pic ?>"  alt="">
                    <h2><?php echo $_SESSION['name'] ?></h2>
                 </div>
                 <hr>
                 <a href="profile.php" class="sub-menu-link">
                  <img src="../images/logout.png" alt="">
                  <p style="color: white;">Company Profile</p>
                  <span> > </span>
               </a>
               <a href="jobpost.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Post Jobs</p>
                <span> > </span>
              </a>
               <a href="postedjob.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Posted Jobs</p>
                <span> > </span>
              </a>
                
               <a href="logout.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Log Out</p>
                <span> > </span>
             </a>
            </div>

          </div>

      </div>
 
    <div class="profile_body">
        <div class="profile">
            <div class="profile_img">
                <img src="../<?php echo $cover_pic ?>"  alt="" style="width:100%; height:500px; border-radius:20px">
               >
                <img src="../<?php echo $pro_pic ?>" alt="" style="width: 14%; margin-top:-8%; border-radius: 50%">
            </div>
            <div class="profile_info">
                <h2><?php echo $_SESSION['name']  ?></h2>
                <h3><?php  echo  $_SESSION['type']  ?></h3>
                <h3><?php  echo   $_SESSION['address']  ?></h3>
                <h3><?php  echo   $_SESSION['email']  ?></h3>
                <p><?php  echo  $_SESSION['description']  ?></p>
            </div>
        </div>
       

    </div> 
    <hr>

    
</body>
</html>
<script>
    let subMenu= document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open");
    } 
  </script>