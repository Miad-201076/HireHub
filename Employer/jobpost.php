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
    <title>Job Post</title>
</head>
<body>
    <div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
          <a href="jobseekers.php">Job Sekkers</a>
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
    <div>
        <?php

            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $type = $_POST['type'];
                $description = $_POST['description'];
                $tag = $_POST['tag'];
                $company_id = $_SESSION['id'];
                $sql = "INSERT INTO job (`j_title`, `j_type`, `j_description`, `needed_skill`, `e_id`) VALUES ('$title','$type','$description','$tag','$company_id')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "<script>alert('Job Posted Successfully')</script>";
                }else{
                    echo "<script>alert('Job Posting Failed')</script>";
                }
            }


        ?>
    </div>
    
    <div class="login-box">
        <h3>Job Posting</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="title" id="" class="email" placeholder="Job Title"  required>
            <select name="type" class="email" id="" required>
                <option value="Remote">Remote</option>
                <option value="Office Work">Office Work</option>
                <option value="Part_Time">Part_Time</option>
                <option value="Full_Time">Full_Time</option>
            </select>
            
            <textarea name="description"class="email"  placeholder="Tuitorial Description....." id="" cols="30" rows="10" required></textarea>
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
            <input type="submit" name="submit" class="approve" value="Upload">

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