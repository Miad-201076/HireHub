<?php

    include('config.php');
    session_start();
    $seeker= $_SESSION['id'];



    $job_id= $_GET['id'];
    $sql= "SELECT * FROM job where j_id='$job_id'";
    $result= mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);
    $j_title= $row['j_title'];
    $j_type= $row['j_type'];
    $e_id= $row['e_id'];
    $j_description= $row['j_description'];
    $needed_skill= $row['needed_skill'];

    $sql5= "SELECT * FROM user where id='$e_id'";
    $result5= mysqli_query($conn,$sql5);
    $row5= mysqli_fetch_assoc($result5);
    $name= $row5['name'];
    $address= $row5['address'];
    $email= $row5['email'];
    $profile_pic= $row5['profile_pic'];



    $id= $_SESSION['id'];
    $sql="SELECT * FROM skills where e_id='$id'";
    $result= mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    $c=0;


    for($i=0;$i<$num;$i++){
        $row= mysqli_fetch_assoc($result);
        $check=$row['skill_name'];

      if($check==$needed_skill){
        $c= 1;
      }
      
    }


  
    if(isset($_GET['apply'])){
        $job_id= $_GET['apply'];
        $sql= "SELECT * FROM job where j_id='$job_id'";
        $result= mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc($result);
        $j_title= $row['j_title'];
        $j_type= $row['j_type'];
        $e_id= $row['e_id'];
        $j_description= $row['j_description'];
        $needed_skill= $row['needed_skill'];
    
    
    
        $id= $_SESSION['id'];
        $sql="SELECT * FROM skills where e_id='$id'";
        $result= mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        $c=0;
    
    
        for($i=0;$i<$num;$i++){
            $row= mysqli_fetch_assoc($result);
            $check=$row['skill_name'];
    
          if($check==$needed_skill){
            $c= 1;
          }
          
        }

        if($c==1){

            $sql1= "SELECT * FROM applicant where j_id='$job_id' AND seeker_id='$seeker'";
            $result1= mysqli_query($conn,$sql1);
            $num= mysqli_num_rows($result1);
            echo $num; 
            if($num==0){
                $sql2= "INSERT INTO applicant (`j_id`,`e_id`,`seeker_id`,`mojor_skill` ) VALUES ('$job_id','$e_id','$seeker','$needed_skill')";
                $result2= mysqli_query($conn,$sql2);
                if($result2){
                    echo "<script>alert('Applied Successfully')
                    window.location.href='jobs.php'
                    </script>";
                   
                }
                else{
                    echo "<script>alert('Application Failed')
                    window.location.href='jobs.php'
                    </script>";
                }


            
            }
            else{
              echo "<script>alert('Already Applied')
              window.location.href='jobs.php'
              </script>";
          
             
            }
         
          }
          else{
           echo "<script>alert('You are not eligible for this job')
           window.location.href='tutorial.php?tag=$needed_skill'</script>";
          }
      

    
        }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>Job Details</title>
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


      <div class="big">

           <div class="left">

            <img src="../<?php echo $profile_pic ?>" alt="">

           </div>
           <div class="left">
            <div class="content">
                <h1 style="color:red;"><?php echo $j_title ?></h1>
                <h2><?php echo $name ?></h2>
                <h3>Location : <?php echo $address?></h3>
                <h3>Job Type: <?php echo $j_type ?></h3>
                <h3>Job Requirements: <?php echo $needed_skill?></h3>
                <p><?php echo $j_description?></p>


            </div>
           

            <div class="btn">
                <a href="jobdetails.php?apply=<?php echo $job_id ?>"class="approve"> Apply</a>
            </div>
           

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


  <style>
    .content{
        margin-top: 10%;
        margin-left: 10%;
    }
    .btn{
        margin-left: 50%;
        margin-top: 10%;
    }
    .big{

        width: 100%;
        height: 70vh;
        display: grid;
        background-color: black;
        background-size: cover;
        border-radius: 40px;
        background-position: center;
        background-repeat: no-repeat;
        grid-template-columns: 1fr 1fr;
        border: 2px solid #1597e7;
      
    }
    .left{
        width: 100%;
        height: 100%;
        background-color: white;
     

    }
    .left img{
        margin-left: 20%;
        margin-top: 10%;
        height: 50%;
        height: 50%;
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