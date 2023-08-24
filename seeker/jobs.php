<?php

include('config.php');
session_start();

$sql= "SELECT * FROM job";
$result= mysqli_query($conn,$sql);
$profile_pic= $_SESSION['profile_pic'];
$name=$_SESSION['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>Company Page</title>
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

      <div class="search-area">
        <form action="" method="get">
            <input type="search" name="searchname" placeholder="Search Via Name" id="name"  >
 
   
          <select name="category" id="">
            <option value="">Select here</option>
            <option value="">IT Firm</option>
            <option value="">Banking</option>
            <option value="">Educational Institute</option>
            <option value="">Consultency</option>
            <option value="">Law Firm</option>

        </select>

        
      </form>

      </div>

        <div class="jobcontainer">

        <?php

        if(mysqli_num_rows($result)>0){

    

        while($row=mysqli_fetch_assoc($result))
        {
          $j_id = $row['j_id'];
          $j_title = $row['j_title'];
          $j_type = $row['j_type'];
          $j_description = $row['j_description'];

      
        ?>

              <div class="job">

                  <div class="logo">
                      <img src="../images/html.png" alt="">
                  </div>
                  <div class="logo l1">
                   <h2><?php echo $j_title?></h2>
                 </div >
                 <div class="logo l2">
                      <p style="text-align:justify"><?php echo $j_description?></p>
                      <a href="jobdetails.php?id=<?php echo $j_id ?>" style="margin-left: 5%;">Read More</a>
                 </div>

              </div>

           <?php
          }
        }
        else{
          echo "No record found";
        }
        ?>   
         
             

        </div>



      <div class="footer">
        <img src="../images/mainlogo.png" style="width: 110px;" alt="">
        <p>We are here to conncet you for better outcome</p>
        <div class="icon">
            <img src="../images/fb.png" style="width: 50px; height:50px" alt="">
            &nbsp;  &nbsp;  &nbsp;
            <img src="../images/tw.png" style="width: 50px; height:50px" alt="">
            &nbsp;  &nbsp;  &nbsp;
            <img src="../images/gmail.png" style="width: 50px; height:50px" alt="">
  
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