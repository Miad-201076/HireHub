<?php
include('config.php');
session_start();
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

      <img src="images/mainlogo.png" style="width:30%" alt="">
      <form action="#" method="post">
        <input type="email" class="email" placeholder="Email" name="email" required>
        <input type="password" class="password" placeholder="Password" name="password" required>
       <input type="submit" name="submit" class="sign-in-button" id="" value="Sign In">
      </form>

      <p>Forgot Password? <a href="reset.html" style="color: rgb(105, 102, 102);">Reset</a> Now</p>
      <p>Don't Have an Account? <a href="SignupSelect.html" style="color: #666262;"> Sign Up</a> Now</p>
    

    </div>
  </div>
</body>
</html>

<?php


if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM user WHERE email='$email' and password='$password' and approval=1";
  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result)>0)
  {

    $row= mysqli_fetch_assoc($result);
    $_SESSION['email']=$email;
    $_SESSION['type']=$row['type'];
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['profile_pic']=$row['profile_pic'];
    $_SESSION['cover_pic']=$row['cover_pic'];
    $_SESSION['description']=$row['description'];
    $_SESSION['address']=$row['address'];
    $_SESSION['university']=$row['university'];
    $_SESSION['education_background']=$row['education_background'];
    $_SESSION['cgpa']=$row['cgpa'];
    $_SESSION['cv']=$row['cv'];
    $_SESSION['company_type']=$row['company_type'];


    if($row['type']=='admin')
    {
      header("Location:Admin/admin.php");
    }
    else if($row['type']=='company')
    {
      header("Location:Employer/homepage.php");
    }
   else{
    header("Location:seeker/seeker.php");
   }
    
  }
  else
  {
    echo "<script>alert('Invalid Email or Password')</script>";
  }
}




?>

