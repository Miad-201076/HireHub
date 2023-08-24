<?php

include('config.php');
session_start();
$pro_pic= $_SESSION['profile_pic'];
$cover_pic= $_SESSION['cover_pic'];

if(isset($_GET['approve'])){
  $j_id= $_GET['approve'];
  $app_id= $_GET['apli'];


  $sql= "UPDATE applicant SET approval = 1  WHERE j_id = '$j_id' AND seeker_id = '$app_id' ";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo "<script>alert('Applicant Has been Approved For interview')</script>";
   
  }
  else{
    echo "<script>alert('Applicant Has been Rejected')</script>";
   
  }
}
if(isset($_GET['dlt'])){
  $id= $_GET['dlt'];
  $sql="UPDATE job SET status = 0 WHERE j_id = '$id'";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo "<script>alert('Job Has been Closed')</script>";
   
  }
  else{
    echo "<script>alert('Job Has been Closed')</script>";
   
  }
}


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

    <table class="content-table">
        <h1 style="text-align: center; margin-top:5%">All Posted Jobs</h1>
        <thead>
        
          <tr>
            <th>Job ID</th>
            <th>Job Title</th>
            <th>Job Type</th>
            <th>Job Description</th>
            <th>Needed Skill (Major One)</th>
            <th>Close</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
           
           $id= $_SESSION['id'];
           
           $sql= "SELECT * FROM job where e_id = '$id'";
           $result_job = mysqli_query($conn,$sql);
           

            while($row=mysqli_fetch_assoc($result_job))
            {
              $id = $row['j_id'];
              $title = $row['j_title'];
              $type = $row['j_type'];
              $description = $row['j_description'];
              $skill = $row['needed_skill'];
        
            ?>

        
            <td><?php echo $id ?></td>
            <td><?php echo $title ?></td>
            <td><?php echo $type ?></td>
            <td><?php echo $description ?></td>
            <td><?php echo $skill ?></td>
            <td><a href="postedjob.php? dlt=<?php echo $id; ?>" class="decline">Close</a></td>
          
          </tr>
          <?php
            }
          ?>
        
        </tbody>

      </table>
    
      <table class="content-table">
        <h1 style="text-align: center; margin-top:5%">Job Applicants</h1>
        <thead>
        
          <tr>
            <th>Job ID</th>
            <th>Job Title</th>
            <th>Applicant Name</th>
            <th>Major Skill Needed</th>
            <th>Pofile</th>
            <th> CV</th>

            <th>Approval</th>
            <th>Reject</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $id= $_SESSION['id'];
            $sql= "SELECT * FROM applicant where e_id = '$id'  AND approval = 0";
           $result_job = mysqli_query($conn,$sql);
           

            while($row=mysqli_fetch_assoc($result_job))
            {
              $id = $row['j_id'];
              $emp_id= $row['seeker_id'];
              $sql2= "SELECT * FROM job where j_id = '$id' ";
              $result_job2 = mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result_job2);
              $title = $row2['j_title'];
              $skill= $row2['needed_skill'];
  
              $skill = $row2['needed_skill'];
              $sql3= "SELECT * FROM user where id = '$emp_id' ";
              $result_job3 = mysqli_query($conn,$sql3);
              $row3=mysqli_fetch_assoc($result_job3);
              $name = $row3['name'];
              $cv= $row3['cv'];
             
        
            ?>
             
                    
              <td><?php echo $id ?></td>
              <td><?php echo $title ?></td>
              <td><?php echo $name  ?></td>
              <td><?php echo $skill?></td>
              <td><a href="viewapplicant.php?app=<?php echo $emp_id?>"class="approve">View </a></td>
              <td><a href="../<?php echo $cv ?>"class="approve">Download</a></td>
 
              <td><a href="postedjob.php?approve=<?php echo $id; ?>&apli=<?php echo $emp_id;?>"class="approve">Approve</a></td>
              <td><a href="postedjob.php? approve=<?php echo $id; ?>" class="decline">Reject</a></td>
              </tr>
          <?php
            }
          ?>
           
          
          </tbody>

      </table>
      <table class="content-table">
        <h1 style="text-align: center; margin-top:5%">Selected Applicants For interview</h1>
        <thead>
        
          <tr>
            <th>Job ID</th>
            <th>Job Title</th>
            <th>Applicant Name</th>
            <th>Major Skill Needed</th>
            <th>Pofile</th>
            <th> CV</th>
          </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $id= $_SESSION['id'];
            $sql= "SELECT * FROM applicant where e_id = '$id'  AND approval = 1";
           $result_job = mysqli_query($conn,$sql);
           

            while($row=mysqli_fetch_assoc($result_job))
            {
              $id = $row['j_id'];
              $emp_id= $row['seeker_id'];
              $sql2= "SELECT * FROM job where j_id = '$id' ";
              $result_job2 = mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result_job2);
              $title = $row2['j_title'];
              $skill= $row2['needed_skill'];
  
              $skill = $row2['needed_skill'];
              $sql3= "SELECT * FROM user where id = '$emp_id' ";
              $result_job3 = mysqli_query($conn,$sql3);
              $row3=mysqli_fetch_assoc($result_job3);
              $name = $row3['name'];
              $cv= $row3['cv'];
             
        
            ?>
             
                    
              <td><?php echo $id ?></td>
              <td><?php echo $title ?></td>
              <td><?php echo $name  ?></td>
              <td><?php echo $skill?></td>
              <td><a href="viewapplicant.php?app=<?php echo $emp_id?>"class="approve">View </a></td>
              <td><a href="../<?php echo $cv ?>"class="approve">Download</a></td>
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
