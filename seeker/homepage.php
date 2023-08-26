<?php

include('config.php');
session_start();
$name=$_SESSION['name'];
$profile_pic= $_SESSION['profile_pic'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="employer.css">
    <title>Employer Home Page</title>
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


      <div class="bigcontainer">

          <div class="cardbig c1">
            <a href="https://news.google.com/home?hl=en-US&gl=US&ceid=US:en">
              <img src="../images/gl.gif" alt="">
          
            </a>
               
          </div>
          <a href="">
            <div class="cardbig c2">
              <img src="../images/amazon.gif" alt="">
           </div>
            
          </a>
        
         <a href="">
         

         </a>
         <div class="cardbig c3">
          <a href="https://www.bbc.com/">
            <img src="../images/bbcnews.gif" alt="">
          </a>
               
         </div>

      </div>
      <hr style="width: 80%;">


      <main>
            <h1 style="text-align: center;">Featured Jobs</h1>
            <div class="jobcontainer">

              <div class="job">

                  <div class="logo">
                      <img src="../images/html.png" alt="">
                  </div>
                  <div class="logo l1">
                   <h2>Front-End Developer With 1/2 years Experience</h2>
                 </div >
                 <div class="logo l2">
                      <p>Date: 25 Oct 2023</p>
                      <p style="text-align:justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus amet optio, facere vero fugit sed voluptates unde sequi eveniet nesciunt!</p>
                      <p>Status : Available</p>
                      <a href="" style="margin-left: 5%;">Read More</a>
                 </div>

              </div>
              <div class="job">

                <div class="logo">
                    <img src="../images/html.png" alt="">
                </div>
                <div class="logo l1">
                 <h2>Front-End Developer With 1/2 years Experience</h2>
               </div >
               <div class="logo l2">
                    <p>Date: 25 Oct 2023</p>
                    <p style="text-align:justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus amet optio, facere vero fugit sed voluptates unde sequi eveniet nesciunt!</p>
                    <p>Status : Available</p>
                    <a href="" style="margin-left: 5%;">Read More</a>
               </div>

            </div>
         
         
             

        </div>
      </main>
      <br>
      <br>
      <hr style="width: 80%;">
      



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