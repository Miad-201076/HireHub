<?php

include('config.php');
session_start();
$pro_pic= $_SESSION['profile_pic'];
$cover_pic= $_SESSION['cover_pic'];


$sql= "SELECT * FROM user WHERE `type` = 'company' and `approval` = 1";
$result = mysqli_query($conn, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
    <title>Jobs Page</title>
</head>
<body>
    <div class="navbar">
        <img src="../images/mainlogo.png" style="width: 7%;" alt="">
          <a href="homepage.php">Home</a>
          <a href="news.html">News</a>
          <a href="jobs.php">Jobs</a>
          <a href="jobseekers.php">Job Sekkers</a>
          <a href="company.php">Company's</a>

          <img src="../<?php echo $pro_pic ?>"  onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%; border-radius: 50%;" > 
        
          <div class="sub-menu-wrap" id="subMenu">

            <div class="sub-menu">
                 <div class="user-info">
                 <img src="../<?php echo $pro_pic ?>"  alt="">
                    <h2><?php echo $_SESSION['name'] ?></h2>
                 </div>
                 <hr>
                 <a href="profile.php" class="sub-menu-link">
                  <img src="../images/logout.png" alt="">
                  <p style="color: white;">Company Profile</p>
                  <span> > </span>
               </a>
               <a href="jobpost.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Post Jobs</p>
                <span> > </span>
              </a>
               <a href="postedjob.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p style="color: white;">Posted Jobs</p>
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

      <div class="search-area">
        <form action="" method="get">
            <input type="search" name="searchname" placeholder="Search Via Name" id="name"  >
 
   
          <select name="category" id="">
            <option value="">Select here</option>
            <option value="">IT Firm</option>
            <option value="">Banking</option>
            <option value="">Educational Institute</option>
            <option value="">Consultency</option>
            <option value="">Law Firm</option>

        </select>

        
      </form>

      </div>


      <div class="card-container">

        <?php
        while($row = mysqli_fetch_assoc($result)){

          $id= $row['id'];
          $cover_pic= $row['cover_pic'];
          $name= $row['name'];
          $type= $row['company_type'];
          $description= $row['description'];
          $profile_pic= $row['profile_pic'];
        ?>
          <div class="card1">

            <a href="company_deails.php?c_id=<?php echo $id?>">
              <img src="../<?php echo $cover_pic ?>" alt="">
              <div class="profileimg">
                <img src="../<?php echo $profile_pic  ?>" alt="">
              </div>
              <h3><?php echo $name ?></h3>
              <h5><?php echo $type ?></h5>
              <p><?php  echo $description ?></p>
            </a>
      </div>
      <?php

}
?>

      


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

  <style>
    

  .profileimg{

    width: 20%;
    height: 25%;
    border-radius: 50%;
    margin-top: -10%;
    margin-left: 5%;
  }
  .profile_info{
    
    margin-left: 1%;

    font-size: 20px;
    font-weight: 500;

  }

    body{
        width: 80%;
        margin-left: 10%;
        color: black;
        font-family: 'Poppins', sans-serif;
       
    }
    .navbar {     
        width: 100%;
        height: 5%;
        top: 0;
        display: flex;
    }
    .navbar a{
        font-family: 'Poppings',sans-serif;
        position: relative;
        text-decoration: none;
        letter-spacing: 0.5px;
        padding-left: 2%;
        margin-top: 2.5%;
        margin-left: 2%;
        cursor: pointer;
        color:black ;
    }
   .navbar a:after{
        content: "";
        position: absolute;
        background-color: rgb(20, 115, 238);
        height: 5px;
        left: 12px;
        width: 0;
        bottom: 25px;
        transition: 0.3s;
    }
    .navbar a:hover{
        color:rgb(20, 115, 238); 
    }
    .navbar a:hover:after{
        width: 100%;

    }

    .sub-menu-wrap{
        position: absolute;
        top: 8%;
        right: 10%;
        width: 320px;
        max-height: 0px;
        overflow: hidden;
        transition: max-height 0.5s;
        border-radius: 40px;
      }
      .sub-menu-wrap.open{
        max-height: 400px;
      }
      .sub-menu{
        background-color: #000000;
        padding: 20px;
        margin: 10px;
        color: azure;
      }
      .user-info{
        display: flex;
        align-items: center;
      }
      .user-info h3{
          font-weight: 500;
      }
      .user-info img{
        width: 50px;
        border-radius: 50%;
       margin-right: 15px;
      }
      .sub-menu hr{
        border: 0;
        height: 1px;
        width: 100%;
        background: #ccc;
        margin: 15px 0 10px ;
      }
      .sub-menu-link{
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #ffffff;
        margin: 12px 0;
      }
    
    
      .sub-menu-link p{
        width: 100%;
    
      }
      .sub-menu-link img{
        width: 30px;
        background: #ffffff;
        border-radius: 50%;
        padding: 8px;
        margin-right: 15px;
    
      }  
      .sub-menu-link span{
        font-size: 22px;
        transition: transform 0.5s;
    
      }
      
      .sub-menu-link:hover span{
        transform: translate(5px);
    
      }
      .sub-menu-link:hover p{
    
        font-weight: 600;
    
      }
      .sub-menu a{
        font-family: 'Poppings',sans-serif;
        cursor: pointer;
        color:white ;
      }
    
    .sub-menu a:hover{
        color:rgb(255, 255, 255); 
      }
    .sub-menu a:hover:after{
        width: 0%;
      }
    .search-area{
        display: flex;
        height: 100px;
        align-items: center;
        justify-content: center;
        margin-top: 0%;
        flex-direction: row;

    }  
    .search-area select{
         width: 200px;
         height: 50px;
         border-radius: 120px;
         font-size: 15px;
         text-align: center;
         margin: 20px;
         text-decoration: none ;
         background-color: #030303;
         color: #ffffff;
         border: none;
         text-decoration: none;
         box-shadow: 4px 4px 0 0 rgb(185, 183, 183);
    }
    .search-area input{
        width: 500px;
        height: 50px;
        border-radius: 120px;
        font-size: 15px;
        text-align: center;
        text-decoration: none ;
        color: rgb(255, 255, 255);
        background-color: #000000;
        border: none;
        box-shadow: 4px 4px 0 0 rgb(185, 183, 183);
        
    }
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    .card1 {
      width: 31%; 
      height:  400px;
      text-align: justify;
      margin: 10px;
      background-color: #000000;
      border-radius: 15px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      color: #ffffff;
      text-decoration: none;
      padding: 5px;
     

    }
    .card1 a{
      text-decoration: none;
    }
    .card1 h5{
        margin-top: -4%;
        text-decoration: none;
        color: #ffffff;
        margin-left: 30.5%;
        font-weight: 710;
    }
    .card1 p{

        text-align: justify;
        margin-top: -2%;
        text-decoration: none;
        color: #ffffff;
        padding: 10px;
        font-size: 14px;
        font-weight: 500;

    }
    .card1 img{
      width: 100%;
      height: 50%;
      border-radius: 15px 15px 0 0;
  
    }
    .profileimg img{
      width: 100%;
      height: 100%;
      border: 2px solid #ffffff;
      border-radius: 0%;
      margin-top: 1%;
      margin-left: -3%;
    }
    .card1 h3{
      margin-top: -9%;
      text-decoration: none;
      color: #ffffff;
      margin-left: 30%;
      font-weight: 710;
    }
    .card1:hover h3{
      color: #090909;
    }
    .card1:hover{
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
      transform: translateY(-5px);
      background-color: #ffffff;
      color: #000000;
      transition: 0.3s;
    }
    .card1:hover a{
      text-decoration: none;
      color: #000000;
    }
    .card1:hover h5{
      color: #000000;
    }
    .card1:hover p{
      color: #000000;
    }
    .tag{
      width: 50%;
      margin-left: 50%;
      position: relative;
      display: flex;

  
    }
    .tg{
     width: 30%;
     border: 2px solid #ffffff;
     align-items: center;
     justify-content: center;
     border-radius: 10%;
     margin-top: -5%;
     height: 30px;
   



    }
    .tg h5{
      margin-top: 1%;
      text-decoration: none;
      color: #ffffff;
    }
  


  /*Footer*/

    .icon{
      display: flex;
      margin-left: 24%;
      margin-top: 20px;

  }
  .footer{
     margin-top: 5%;
     background-color: #e9e1e1;
      width: 100%;
      display: flex;
      border-radius: 10px;
      color: #000000;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);

  }
  .footer p{
      text-align: center;
      margin-left: 30%;
      margin-top: 3%;
      font-size:18px;
  }


  /*Home Page*/

.bigcontainer{
  margin-left: 10%;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(3, 1fr);
  grid-column-gap: 1%;
  grid-row-gap: 2%;
  width: 80%;
  height: 600px;
  background-color: #ffffff;

}
.cardbig{
    
  background-color: #ccc;

}

 .c1{

       border-radius: 10px;
       grid-column-start: 1;
        grid-column-end: 3;
        grid-row-start: 1;
        grid-row-end: 4;
    


}
.c1 img{
  width: 100%;
  box-shadow: none;
  height: 100%;
  border-radius: 10px 10px 10px 10px;
}

.c1:hover{
  box-shadow: 0 0 5px rgba(0, 0, 0, 10);
  transform: translateY(-5px);
  background-color: rgb(108, 105, 105);
  color: #000000;
  transition: 0.4s;
  
}




.c2{
  border-radius: 10px;
  grid-column-start: 4;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-end: 3;
}
.c2 img{
  width: 100%;
  height: 100%;
  border-radius: 10px 10px 10px 10px;
}
.c2:hover{
  box-shadow: 0 0 5px rgba(0, 0, 0, 10);
  transform: translateY(-5px);
  background-color: rgb(108, 105, 105);
  color: #000000;
  transition: 0.4s;
}
.c3{
  background-color: rgb(67, 56, 56);
  border-radius: 10px;
  border-radius: 10px;
  grid-column-start: 3;
  grid-column-end: 3;
  grid-row-start: 2;
  grid-row-end: 4;
}

.c3 img{
  border-radius: 10px;
  width: 100%;
  height: 100%;
}
.c3:hover{
  box-shadow: 0 0 5px rgba(0, 0, 0, 10);
  transform: translateY(-5px);
  background-color: rgb(108, 105, 105);
  color: #000000;
  transition: 0.4s;
}
/* Jobs */

.jobcontainer{
  margin-left: 10%;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-column-gap: 1.5%;
  grid-row-gap: 2%;
  width: 80%;
  /* background-color: #000000; */

}
.job{
  background-color: #ffffff;
  border-radius:10px;
  width: 100%;
  height: 300px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-template-rows: repeat(3, 1fr);
  grid-column-gap: 1%;
  box-shadow: 2px 5px 6px 5px gray;
  grid-gap: 2%;
}
.logo{
  justify-content: center;
  align-items: center;
}
.logo img{
  border: 2px solid #ffffff;
  margin-left: 30%;
  margin-top: 10%;
  width: 43%;
  height: 60%;
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 1;
  grid-row-end: 4;
}
.l1{
  

  grid-column-start: 2;
  grid-column-end: 5;

}
.l1 h2{
  margin-left: 2%;
  color: #2f2d2d;
}
.l2{

  grid-column-start: 2;
  grid-column-end: 5;
  grid-row-start: 2;
  grid-row-end: 4;
}
.l2 p{
  margin-left: 2%;
}
.l2 a{
  text-decoration: none;
  background-color: #000000;
  border-radius: 2px;
  font-size: 14px;
  color: #fffefe;
  border: 10px solid #000000;
  border-radius: 10px;

}

.job:hover{
  box-shadow: 0 0 5px rgba(0, 0, 0, 10);
  transform: translateY(-5px);
  background-color: rgb(185, 180, 180);
  color: #000000;
  transition: 0.4s;
}
.job:hover a{
  text-decoration: none;
  background-color: #ffffff;
  color: #070707;
  border: 10px solid #fffcfc;
  font-weight: 600;
}
.job:hover p{
  color: #fffefe;
}
.job:hover h2{
  color: #fffefe;
  
}
  </style>