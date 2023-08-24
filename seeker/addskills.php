<?php
  include('config.php');
  session_start();

  $name= $_SESSION['name'];
  $profile_pic= $_SESSION['profile_pic'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="employer.css">
    <title>>Add Skills</title>
</head>
<body>
<div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
          <a href="jobseekers.php">Job Sekkers</a>
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
    <div>
        <?php

            if(isset($_POST['submit'])){

              $skill= $_POST['tag'];
              $id= $_SESSION['id'];
              $sql1= "SELECT * FROM skills WHERE `e_id`='$id' AND `skill_name`='$skill'";
              $result1= mysqli_query($conn,$sql1);
              $num= mysqli_num_rows($result1);
              if($num==0){
                $sql= "INSERT INTO `skills`(`e_id`, `skill_name`) VALUES ('$id','$skill')";
                $result= mysqli_query($conn,$sql);
                if($result){
                  echo "<script>alert('Skill Added Successfully')</script>";
                }
                else{
                  echo "<script>alert('Skill Not Added')</script>";
                }

              }
              else{
                echo "<script>alert('This Skill Already Added')</script>";
              }
              

            }


        ?>
    </div>
    
    <div class="login-box">
        <h3>Add Skills</h3>
        <form action="" method="post" enctype="multipart/form-data">
            
            <select name="tag" class="email" id="" required>
                <option value="php">php</option>
                <option value="Django">Django</option>
                <option value="ReactJS">ReactJS</option>
                <option value="NexJS">NexJS</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="HTML">HTML</option>
            </select>
            <br>
            <br>
            <input type="submit" name="submit" class="approve" value="Add">

        </form>

    </div>



</body>
</html>
<script>
    let subMenu= document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open");
    } 
  </script>
<style>
    .login-box {
        margin-top: 10%;
        margin-left: 30%;
        background-color: #fff;
        border-radius: 10px;
        width: 500px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
      }
  .email,
  .password {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
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
  .decline{
    background-color: #ff0000; 
    color: rgb(245, 241, 241); 
    border: 1px solid #ff0000;
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
.decline:hover {
    background-color: #fffefe;
    color: rgb(0, 0, 0);
  }
  
</style>