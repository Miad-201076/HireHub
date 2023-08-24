<?php

  include('config.php');
  session_start();
  $pro_pic= $_SESSION['profile_pic'];
  $cover_pic= $_SESSION['cover_pic'];
  $name= $_SESSION['name'];


  if(isset($_GET['tag'])){
    $tag= $_GET['tag'];
    $sql= "SELECT * FROM tutorial WHERE `t_type`='$tag'";
    $result_job = mysqli_query($conn,$sql);
  }
  else{
    $sql= "SELECT * FROM tutorial";
    $result_job = mysqli_query($conn,$sql);
  }
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>Tutorial</title>
</head>
<body>
    <div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
          <a href="tutorial.php">Tutorial</a>
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

      <table class="content-table">
        <h1 style="text-align: center; margin-top:5%">Applied Jobs</h1>
        <thead>
        
          <tr>
            <th>Tutorial ID</th>
            <th>Tutorial Title</th>
            <th>Tutorial Description</th>
            <th>Tutorial Tag</th>
            <th>File</th>
           
          </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            

            while($row=mysqli_fetch_assoc($result_job))
            {
             
              $id = $row['t_id'];
              $title = $row['t_title'];
              $file = $row['t_file'];
              $description = $row['t_description'];
              $type = $row['t_type'];
        
            ?>
             

          
              <td><?php echo $id ?></td>
              <td><?php echo $title ?></td>
              <td><?php echo $description  ?></td>
              <td><?php echo $type ?></td>
              <td><a href="<?php echo $file ?>" class="approve">View</a></td>
              </tr>
          <?php
            }
          ?>
           
          
          </tbody>

      </table>



    
</body>
</html>


<style>
    .content-table {

        margin-left: 15%;
        width: 70%;
        border-collapse: collapse;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        text-align: center;
    }
    
    .content-table thead tr {
        background-color: #1597e7;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    
    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }
    
    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    
    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    
    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #1597e7;
    }
    
    .content-table tbody tr.active-row {
        font-weight: bold;
        color: #1597e7;
    }
</style>
<script>
    let subMenu= document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open");
    } 
  </script>