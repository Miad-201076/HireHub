<?php

  include('config.php');
  session_start();

  if(isset($_GET['c_id'])){
    $id=$_GET['c_id'];
    $query="SELECT * FROM user WHERE id='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $type=$row['company_type'];
    $address=$row['address'];
    $email=$row['email'];
    $description=$row['description'];
    $pro=$row['profile_pic'];
    $cover_pic=$row['cover_pic'];


  }
  else{
    header("location:company.php");
  }

  $profile_pic= $_SESSION['profile_pic'];
  $name=$_SESSION['name'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>Detals</title>
</head>
<body>
<div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
          <a href="tutorial.php">Tutorial</a>
          <a href="company.php">Company's</a>

          <img src="../<?php echo $profile_pic  ?>" onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%; border-radius:50%" > 
        
          <div class="sub-menu-wrap" id="subMenu">

            <div class="sub-menu">
                 <div class="user-info">
                    <img src="../<?php echo $profile_pic  ?>"  alt="">
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
                <img src="../<?php echo $cover_pic?> " alt=""  style="width:100%; height:500px; border-radius:20px">
                <img src="../<?php echo $pro?>" alt="" style="width: 12%; margin-top:-8%;margin-left:3%;  border: 2px solid #ffffff;  border-radius:50%;">
            </div>
            <div class="profile_info">
                <h2><?php  echo  $name  ?></h2>
                <h3><?php  echo  $type  ?></h3>
                <h3><?php  echo  $address  ?></h3>
                <h3><?php  echo  $email  ?></h3>
                <p><?php  echo  $description  ?></p>
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