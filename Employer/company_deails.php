<?php

  include('config.php');
  session_start();
  $pro_pic= $_SESSION['profile_pic'];
$cover_pic= $_SESSION['cover_pic'];


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
    $profile_pic=$row['profile_pic'];
    $cover_pic=$row['cover_pic'];


  }
  else{
    header("location:company.php");
  }


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
          <a href="company.php">Company's</a>

          <img src="../<?php echo $pro_pic ?>"  onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%; border-radius:50%;" > 
        
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
                <img src="../<?php echo $cover_pic?> " alt=""  style="width:100%; height:500px; border-radius:20px;   ;">
                <img src="../<?php echo $profile_pic?>" alt="" style="width: 12%; margin-top:-8%;margin-left:3%;border-radius:50%; border: 3px solid #000">
            </div>
            <div class="profile_info">
              <div class="content">
              <h2><?php  echo  $name  ?></h2>
                <h3><?php  echo  $type  ?></h3>
                <h3><?php  echo  $address  ?></h3>
                <h3><?php  echo  $email  ?></h3>
                <p><?php  echo  $description  ?></p>

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
  .profile_info img{
 
  }
  .content{
   width: 100%;
   padding: 5px;
   margin-left: 1%;
  }
  </style>