<?php

include('config.php');
session_start();


if(isset($_GET['approve'])){
  $id = $_GET['approve'];
  $sql = "UPDATE user SET `approval` = 1 WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo "<script>alert('Approved')</script>";
  }
  else{
    echo "<script>alert('Error')</script>";
  }
}
if(isset($_GET['decline'])){
  $id = $_GET['decline'];
  $sql = "DELETE FROM user WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo "<script>alert('Declined')</script>";
  }
  else{
    echo "<script>alert('Error')</script>";
  }
}

$sql = "SELECT * FROM user  WHERE `approval` = 0 and `type` = 'company'";
$result_company = mysqli_query($conn, $sql);

$sql = "SELECT * FROM user  WHERE `approval` = 0 and `type` = 'seeker'";
$result_seeker = mysqli_query($conn, $sql);






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="admin.css">
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
        <table class="content-table">
            <h1 style="text-align: center; margin-top:5%">New Compnay Approval</h1>
            <thead>
            
              <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Logo</th>
                <th>Approval</th>
                <th>Decline</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <?php
                  while($row=mysqli_fetch_assoc($result_company))
                  {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $logo = $row['profile_pic'];
              
                  ?>

              
                  <td><?php echo $name ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $address ?></td>
                  <td><img src="../<?php echo $logo?>" alt="" style="width: 80px; height:75px"></td>
                  <td><a href="approval.php? approve=<?php echo $id; ?>" class="approve">Approve</a></td>
                  <td><a href="approval.php? decline=<?php echo $id; ?>" class="decline">Decline</a></td>
                </tr>
                <?php
                  }
                ?>
              
              </tbody>

          </table>
          <table class="content-table">
            <h1 style="text-align: center; margin-top:5%">New Job Seekers Approval</h1>
            <thead>
            
              <tr>
                <th>Company Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Logo</th>
                <th>Approval</th>
                <th>Decline</th>
              </tr>
            </thead>
        
            <tbody>
            <tr>
                  <?php
                  while($row=mysqli_fetch_assoc($result_seeker))
                  {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $logo = $row['profile_pic'];
                  
                  ?>

              
                  <td><?php echo $name ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $address ?></td>
                  <td><img src="../<?php echo $logo ?>" alt="" style="width: 80px; height:75px"></td>
                  <td><a href="approval.php? approve=<?php echo $id; ?>" class="approve">Approve</a></td>
                  <td><a href="approval.php? decline=<?php echo $id; ?>" class="decline">Decline</a></td>
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





