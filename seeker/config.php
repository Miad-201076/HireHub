<?php

$dbname= "hirehub";

$conn = mysqli_connect('localhost','root','',$dbname);

if($conn->connect_error){
    die("Connection failed: ".mysqli_connect_error());
}
else{
    //  echo "Connected successfully";
    //  echo "<br>";
    //  $time = date("Y-m-d H:i:s");
    //  echo $time;
    //  echo "<h3> $dbname</h3>";
    // echo $conn->host_info;
 
}

?>