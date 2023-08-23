<?php
include('config.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <div class="navbar">
      <img src="images/mainlogo.png" style="width: 10%;" alt="">
        <div class="navright">
             
            <a href="SignupSelect.php">Sign Up</a>
            <a href="login.php">Log In</a>
            <a href="#">Our Services</a>
       


        </div>
    </div>
    <hr>

    <div class="slider">
        <img src="" alt="" id="sliderImg1" class="image1">
        
       
    </div>

    <hr>
    <br>

    <div class="main">
        <h1 style="text-align: center;">Our Services</h1>
        <hr>

        <div class="hirer">
            <img src="images/hirer.jpg" style="width: 45%;  border-radius:10px ;" alt="">
            
         
            <br>
           <div class="description">
                 <h1>Hirer</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellat sint illo facilis sit quia ex, officia esse repudiandae tempore beatae ducimus asperiores voluptatem natus mollitia architecto et, error quisquam quos hic fugit. Optio autem labore ipsa minus! Aliquam esse iusto ad cum magnam ea vel obcaecati repellat culpa eos, suscipit non, sequi error praesentium asperiores, rerum commodi repellendus perspiciatis! Ipsam explicabo voluptatem perspiciatis vitae magni impedit! Odio assumenda quam optio esse temporibus voluptate ad sit praesentium placeat ex autem aliquid suscipit iusto, quo, dicta perferendis quasi rem nemo architecto excepturi? Reprehenderit iure asperiores error distinctio inventore quos at omnis.</p>              
           </div>

           
        </div>
        <br>
        <hr style="width: 50%;">
        <br>
        <br>
        <div class="employee">
            <img src="images/employee.webp" style="width: 45%;  border-radius:10px ;" alt="">
            
         
            <br>
           <div class="description" style="margin-right: 5%;">
                 <h1>Employee</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium repellat sint illo facilis sit quia ex, officia esse repudiandae tempore beatae ducimus asperiores voluptatem natus mollitia architecto et, error quisquam quos hic fugit. Optio autem labore ipsa minus! Aliquam esse iusto ad cum magnam ea vel obcaecati repellat culpa eos, suscipit non, sequi error praesentium asperiores, rerum commodi repellendus perspiciatis! Ipsam explicabo voluptatem perspiciatis vitae magni impedit! Odio assumenda quam optio esse temporibus voluptate ad sit praesentium placeat ex autem aliquid suscipit iusto, quo, dicta perferendis quasi rem nemo architecto excepturi? Reprehenderit iure asperiores error distinctio inventore quos at omnis.</p>              
           </div>
           
        </div>
        <hr>
    </div>

    <div class="footer">
        <img src="images/mainlogo.png" style="width: 10%;" alt="">
        <p>We are here to conncet you for better outcome</p>
        <div class="icon">
            <img src="images/fb.png" style="width: 50px; height:50px" alt="">
            &nbsp;  &nbsp;  &nbsp;
            <img src="images/tw.png" style="width: 50px; height:50px" alt="">
            &nbsp;  &nbsp;  &nbsp;
            <img src="images/gmail.png" style="width: 50px; height:50px" alt="">

        </div>

       


    </div>

    
    
   

    
</body>
</html>


<style>
    body{
        width: 80%;
        background-color: rgb(0, 0, 0);
        margin-left: 10%;
        color: aliceblue;
       
    }
    .icon{
        display: flex;
        margin-left: 25%;
        margin-top: 20px;

    }
    .footer{
        width: 100%;
        display: flex;

    }
    .footer p{
        text-align: center;
        margin-left: 27%;
        font-size: 25px;
    }
    .hirer{
        display: flex;
    }
    .employee{
        display: flex;
        flex-direction: row-reverse;
    }

    .description{
        width: 50%;
        height: 0%;
        margin-top: 5%;
        margin-left: 5%;
        text-align: center;
 
    }
   
    .slider {
        width: 100%;
        position: relative;
        display: inline-block;
        background-size: 100%;
        background-color: black;
    }
    .slider .image1{
       width: 100%;
       height: 750px;
       background-image: url(images/hire.jpg);
       background-size: 100%;
       animation: changeImage 20s linear infinite;

    }
    @keyframes changeImage{
        0% {
           background-image: url(images/hire.jpg); 
        }
        25% {
            background-image: url(images/jobsearch.jpg); 
         }
        50% {
            background-image: url(images/find.jpg); 
         }
         75% {
            background-image: url(images/job.png); 
         }
         100% {
            background-image: url(images/jobs.png); 
         }
}
   
   
    .navbar {     
        width: 100%;
        text-align: center;
        height: 5%;
        top: 0;
        color: aliceblue;


    }
    .navright{
        display: flex;
        margin-right: 20px;
        flex-direction: row-reverse;
        color: aliceblue;

    }
    .navright a{
        font-family: 'Poppings',sans-serif;
        position: relative;
        text-decoration: none;
        color: aliceblue;
        padding-left: 4%;
        margin-top: -5%;
        border-color: aliceblue;
        letter-spacing: 1px;
        font-size: 18px;
       cursor: pointer;
       margin-right: 1%;
    }
    .navright a:after{
       content: "";
       position: absolute;
       height: 5px;
       left: 30px;
       width: 0;
       bottom: 45px;
       transition: 0.3s;
       background-color: rgb(255, 255, 255);
      
    }
    .navright a:hover:after{
        width: 100%;
    }
</style>

