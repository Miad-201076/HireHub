<?php

include('config.php');
session_start();




if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "UPDATE user SET email = '$email', password = '$pass' WHERE type = 'admin'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Admin Profile Updated')</script>";
      }
      else{
        echo "<script>alert('Update Error')</script>";
      }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Header</title>
</head>
<body>
    <body>
        <div class="navbar">
          <img src="../images/mainlogo.png" style="width: 7%;" alt="">
            <a href="admin.php">Dashboard</a>
            <a href="approval.php">Approval</a>
            <a href="tutorial.php">Tutorial Upload</a>
            <a href="settings.php">Settings</a>
            <img src="../images/avatar.png" onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%" > 
          
            <div class="sub-menu-wrap" id="subMenu">
  
              <div class="sub-menu">
                   <div class="user-info">
                      <img src="../images/avatar.png"  alt="">
                      <h2>Admin</h2>
                   </div>
                   <hr>
                  
                 <a href="logout.php" class="sub-menu-link">
                  <img src="../images/logout.png" alt="">
                  <p>Log Out</p>
                  <span> > </span>
               </a>
              </div>
  
            </div>

        </div>
        <div class="login-box">
            <h3>Update Admin Profile</h3>
            <form action="" method="post">
                <label for=""></label>
                <input type="email" name="email" id="" class="email" placeholder="New Email"  required>
                <input type="password" name="pass" id="" class="email" placeholder="New Password"  required>
            
                <br>
                <br>
                <input type="submit" name="submit" class="approve" value="Update">
    
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