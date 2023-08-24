<?php

include('config.php');
session_start();
$pro_pic= $_SESSION['profile_pic'];
$applicatn_id= $_GET['app'];

$sql="SELECT * FROM user WHERE id = '$applicatn_id' ";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$profile_pic= $row['profile_pic'];
$cover_pic= $row['cover_pic'];
$applicantname= $row['name'];
$email= $row['email'];
$address= $row['address'];
$university= $row['university'];
$cgpa= $row['cgpa'];
$description= $row['description'];
$cv= $row['cv'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>View Applicant</title>
</head>
<body>

    <div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
         
          <a href="company.php">Company's</a>
    
          <img src="../<?php echo $pro_pic ?>"  onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%; border-radius: 50%;" > 
        
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
                <img src="../<?php echo $profile_pic ?>" alt="" style="width: 14%; margin-top:-8%; border-radius: 50%;margin-left:3%">
            </div>
            <div class="profile_info">
              <div class="content">
               <h2><?php echo $applicantname  ?></h2>
               <h5><?php  echo  $email  ?></h5>
               <p>Address: <?php  echo  $address  ?></p>
               <p>University: <?php  echo   $university  ?></p>
               <p>CGPA: <?php  echo  $cgpa  ?></p>
               <p><?php  echo  $description  ?></p>
               <h4>Skills: 
                
               <?php  
               
                $sql = "SELECT * FROM skills WHERE e_id = '$applicatn_id' ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                  $skill = $row['skill_name'];
                  echo $skill.", ";
             }
               
               ?>
              
              
              </h4>
                <a href="../<?php echo $cv ?>" class="approve">Download CV</a>
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
      
.approve{
    background-color: #1597e7; 
    color: rgb(245, 241, 241); 
    border: 1px solid #1597e7;
    padding: 10px 20px;
    border-radius: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}
.approve:hover {
    background-color: #ffffff;
    color: rgb(7, 7, 7);
  }
    


</style>
