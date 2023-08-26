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
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .logo {
      margin-bottom: 20px;
    }

    .logo img {
      height: 100px;
    }

    .content {
      margin-bottom: 20px;
      color: #fffbfb;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .button {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .footer {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    .icon {
      margin: 0 10px;
    }
    .button {
      background-color: #000000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;

    }
    a{
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="images/mainlogo.png" alt="Logo">
    </div>
    <div class="content">
      <h1>How do you want to register yourself?</h1>
    </div>
    <div class="buttons">
     <button class="button"><a href="signupEmployee.php">Employee</a></button>
     <button class="button"><a href="signupHirer.php">Employer</a></button>
     
    </div>
   
  </div>
</body>
</html>
