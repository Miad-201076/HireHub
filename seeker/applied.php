<?php

include('config.php');
session_start();
$profile_pic= $_SESSION['profile_pic'];
$name= $_SESSION['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Admin/admin.css">
    <title>Document</title>
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

    
    
      <table class="content-table">
        <h1 style="text-align: center; margin-top:5%">Applied Jobs</h1>
        <thead>
        
          <tr>
            <th>Job ID</th>
            <th>Job Title</th>
            <th>Applicant Name</th>
            <th>Needed Skill (Major One)</th>
            <th>Status</th>
           
          </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $id= $_SESSION['id'];
            $sql= "SELECT * FROM applicant where seeker_id = '$id' ";
            $result_job = mysqli_query($conn,$sql);
           

            while($row=mysqli_fetch_assoc($result_job))
            {
              $id = $row['j_id'];
              $emp_id= $row['seeker_id'];
              $status= $row['approval'];
              $sql2= "SELECT * FROM job where j_id = '$id' ";
              $result_job2 = mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result_job2);
              $title = $row2['j_title'];
              $skill= $row2['needed_skill'];
             
              if($status==1){

                $status= "Selected For Interview";
              }
              else{
                $status= "Pending";
              }
  
              $skill = $row2['needed_skill'];
              $sql3= "SELECT * FROM user where id = '$emp_id' ";
              $result_job3 = mysqli_query($conn,$sql3);
              $row3=mysqli_fetch_assoc($result_job3);
              $name = $row3['name'];
        
            ?>
             

          
              <td><?php echo $id ?></td>
              <td><?php echo $title ?></td>
              <td><?php echo $name  ?></td>
              <td><?php echo $skill ?></td>
              <td><?php echo $status ?></td>
              </tr>
          <?php
            }
          ?>
           
          
          </tbody>

      </table>
</body>
</html>


<script>
  let subMenu= document.getElementById("subMenu");
  function toggleMenu(){
    subMenu.classList.toggle("open");
  } 
</script>
<style>