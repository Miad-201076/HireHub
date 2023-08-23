<?php

include('config.php');

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
                    <img src="../images/company1.png"  alt="">
                    <h2>Admin</h2>
                 </div>
                 <hr>
                 <a href="profile.php" class="sub-menu-link">
                  <img src="../images/logout.png" alt="">
                  <p style="color: white;">Company Profile</p>
                  <span> > </span>
               </a>
               <a href="#" class="sub-menu-link">
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
                <img src="../images/web.jpg" alt=""  style="width:100%; height:500px; border-radius:20px">
                <img src="../images/company1.png" alt="" style="width: 14%; margin-top:-8%;">
            </div>
            <div class="profile_info">
                <h2>Company Name</h2>
                <h3>Company Type</h3>
                <h3>Company Address</h3>
                <h3>Company Email</h3>
                <h3>Company Phone</h3>
                <h3>Company Website</h3>
            </div>
        </div>
       

    </div> 
    <hr>
 
    <div class="jobs">
        <h1 style="text-align: center;">Posted Jobs</h1>
        <div class="job">
            <div class="job_info">
                <h2>Job Title</h2>
                <h3>Job Type</h3>
                <h3>Job Location</h3>
                <h3>Job Salary</h3>
                <h3>Job Description</h3>
                <h3>Job Requirements</h3>
            </div>    
    </div>

    
</body>
</html>
<script>
    let subMenu= document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open");
    } 
  </script>