<?php

include('config.php');
session_start();

if(isset($_POST['submit'])){

     
  $filename = $_FILES['video']['name'];
  $tempname = $_FILES['video']['tmp_name'];
  $img_ex_lc = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  $allowed_exs = array("mp4");


   if(in_array($img_ex_lc, $allowed_exs)){
    $folder= "../videos/".$filename;
    move_uploaded_file($tempname, $folder);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tag = $_POST['tag'];
    $tutorialvid = $folder;


   
    $sql = "INSERT INTO tutorial (`t_title`, `t_description`, `t_type`, `t_file`) VALUES ('$title', '$description', '$tag', '$tutorialvid')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Tutorial Uploaded')</script>";
      }
      else{
        echo "<script>alert('Upload Error')</script>";
      }
    }
    else{
      echo "<script>alert('Invalid File')</script>";
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
            <h3>Tutorial Upload</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="title" id="" class="email" placeholder="Tuitorial Title"  required>
                
                <textarea name="description"class="email"  placeholder="Tuitorial Description....." id="" cols="30" rows="10" required></textarea>
                <select name="tag" class="email" id="" required>
                    <option value="php">php</option>
                    <option value="Django">Django</option>
                    <option value="ReactJS">ReactJS</option>
                    <option value="NexJS">NexJS</option>
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="HTML">HTML</option>
                    <option value="Business Analytics">Business Analytics</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Content Writing">Content Writing</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="UI/UX Design">UI/UX Design</option>
                    <option value="Video Editing">Video Editing</option>
                    <option value="Animation">Animation</option>
                <option value="LAw">Photography</option>
                </select>
                <label for="">Tutorial (Mp4 file)</label> &nbsp;&nbsp;&nbsp;
                <input type="file" name="video" id="" class="cv" required>
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