<?php

include('config.php');
session_start();
$pro_pic= $_SESSION['profile_pic'];
$cover_pic= $_SESSION['cover_pic'];
$name= $_SESSION['name'];



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

          <img src="../<?php echo $pro_pic  ?>" onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%; border-radius:50%" > 
        
          <div class="sub-menu-wrap" id="subMenu">

            <div class="sub-menu">
                 <div class="user-info">
                    <img src="../<?php echo $pro_pic  ?>"  alt="">
                    <h2><?php echo $name ?></h2>
                 </div>
                 <hr>
                 <a href="profile.php" class="sub-menu-link">
                  <img src="../images/logout.png" alt="">
                  <p style="color: white;"> Profile</p>
                  <span> > </span>
               </a>
               <a href="addskills.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Add Skills </p>
                <span> > </span>
              </a>
               <a href="applied.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Applied Jobs</p>
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
                <img src="../<?php echo $pro_pic ?>" alt="" style="width: 14%; margin-top:-8%; border-radius: 50%;margin-left:3%">
            </div>
            <div class="profile_info">
              <div class="content">
               <h2><?php echo $_SESSION['name']  ?></h2>
               <h5><?php  echo   $_SESSION['email']  ?></h5>
               <p>Address: <?php  echo   $_SESSION['address']  ?></p>
               <p>University: <?php  echo   $_SESSION['university']  ?></p>
               <p>CGPA: <?php  echo   $_SESSION['cgpa']  ?></p>
               <p><?php  echo  $_SESSION['description']  ?></p>
               <h4>Skills: 
                
               <?php  
               
                $sql = "SELECT * FROM skills WHERE e_id = '".$_SESSION['id']."' ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                  $skill = $row['skill_name'];
                  echo $skill.", ";
             }
               
               ?>
              
              
              </h4>
                <a href="../images/cv/abu.pdf" class="approve">Download CV</a>
              </div>
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

  <style>
    .profile_info{
    width: 100%;
    background-color: #dddddd;
    border-radius: 20px;
    margin-left: 1%;
    color: #000000;
    font-size: 16px;
    font-weight: 500;
    shadow: 0 0 10px rgba(0,0,0,0.5);

  }
  .content{
   width: 100%;
   padding: 5px;
   margin-left: 1%;
  }
  </style>