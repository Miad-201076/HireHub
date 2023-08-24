<?php
include('config.php');
?>


<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url("images/bg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background-color: #fff;
      border-radius: 10px;
      width: 500px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    .cv{
      width: 20%;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    .logo {
      margin-bottom: 20px;
    }

    .logo img {
      height: 80px;
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

    .forgot-password {
      text-align: right;
      margin-bottom: 10px;
    }

    .sign-in-button {
      background-color: #000000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;

    }

    .sign-up-text {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-box">


      <img src="images/mainlogo.png" style="height: 30%; width: 30%" alt="">
      <h3>Employee</h3>
      <form action="#" method="post" enctype="multipart/form-data">
        <label for="">Profile Picture</label>
        <input type="file" name="profilepic" id="" class="cv" placeholder="Profile Picture" value="Profile picture" required>
        <label for="">Cover Picture</label>
        <input type="file" name="coverpic" id="" class="cv" placeholder="Profile Picture" value="Profile picture" required>
        <input type="text" name="name" class="email" placeholder="Name" required>
        <input type="email" name="email" class="email" placeholder="Email" required>
        <select name="education" id="" class="email" aria-placeholder="Educational Background">
            <option value="BSCSE">BSCSE</option>
            <option value="BSEEE">BSEEE</option>
            <option value="BSMECHANICAL">BSMECHANICAL</option>
            <option value="BSCivil">BSCivil</option>
            <option value="BBA General">BBA General</option>
            <option value="Accounting">Accounting</option>
            <option value="Finance">Finance</option>
            <option value="HR">HR</option>
            <option value="Management">Management</option>
        </select>
      
        <select name="institute" id="" class="email" aria-placeholder="Educational institute" required>
            <option value="UIU">UIU</option>
            <option value="NSU">NSU</option>
            <option value="BRAC">BRAC</option>
            <option value="BUET">BUET</option>
            <option value="DU">DU</option>          
        </select>
        <input type="text" class="email" name="CGPA" placeholder="UNI-CGPA" required>
       
        <input type="password" name="pass" class="password" placeholder="Password" required>
        <label for="">Upload your CV</label>
        <input type="file" name="cv" id="" class="cv" placeholder="Upload Your CV" value="CV">
        <br>
        <textarea name="description" id="" class="email" cols="20" rows="6" placeholder="your short description..." required></textarea>
       <input type="submit" name="submit" class="sign-in-button" id="" value="Sign Up">
       
      </form>

      <p>Forgot Password? <a href="reset.html" style="color: rgb(105, 102, 102);">Reset</a> Now</p>
      <p>Already have  an Account? <a href="login.php" style="color: #666262;"> Sign in</a> Now</p>
    

    </div>
  </div>
</body>
</html>
<?php

  if(isset($_POST['submit'])){
    $filename= $_FILES['profilepic']['name'];
    $tempname= $_FILES['profilepic']['tmp_name'];
    $img_ex = pathinfo($filename, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png"); 

    if(in_array($img_ex_lc, $allowed_exs)){
      $filename1= $_FILES['coverpic']['name'];
      $tempname1= $_FILES['coverpic']['tmp_name'];
      $img_ex1 = pathinfo($filename1, PATHINFO_EXTENSION);
      $img_ex_lc1 = strtolower($img_ex1);
      $allowed_exs1 = array("jpg", "jpeg", "png");
      if(in_array($img_ex_lc1, $allowed_exs1)){

       

        $filename2= $_FILES['cv']['name'];
        $tempname2= $_FILES['cv']['tmp_name'];
        $img_ex2 = pathinfo($filename2, PATHINFO_EXTENSION);
        $img_ex_lc2 = strtolower($img_ex2);
        $allowed_exs2 = array("pdf", "docx");
        if(in_array($img_ex_lc2, $allowed_exs2)){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $education = $_POST['education'];
          $institute = $_POST['institute'];
          $CGPA = $_POST['CGPA'];
          $location = $_POST['location'];
          $pass = $_POST['pass'];
          $description = $_POST['description'];
          $folder = "images/profile/".$filename;
          $folder1 = "images/banner/".$filename1;
          move_uploaded_file($tempname, $folder);
          move_uploaded_file($tempname1, $folder1);
          $type= "seeker";
          $folder2 = "images/cv/".$filename2;
          move_uploaded_file($tempname2, $folder2);
          $sql="SELECT * FROM user WHERE email='$email'";
          $result=mysqli_query($conn,$sql);
          $num= mysqli_num_rows($result);
  
          if($num==0){
            $sql1= "INSERT INTO user (`name`, `email`, `education_background`, `university`, `cgpa`, `password`, `description`, `profile_pic`, `cover_pic`,`approval`,`type`,`cv`) VALUES ('$name', '$email', '$education', '$institute', '$CGPA', '$pass', '$description', '$folder', '$folder1',0,'$type','$folder2')";
            $result1=mysqli_query($conn,$sql1);
            if($result1){
              echo "<script>alert('User  Account Created Successfully')</script>";
            }
            else{
              echo "<script>alert('User  Account Creation Failed')</script>";
            }
  
          }
          else{
            echo "<script>alert('Account with this Email Already Exists')</script>";
          }
        }
        else{
          echo "<script>alert('Please upload an pdf file only')</script>";
        }

       


      

      }
      else{
        echo "<script>alert('Please upload an image file only')</script>";
      }
    }
    else{
      echo "<script>alert('Please upload an image file only')</script>";
    }

  }

?>
