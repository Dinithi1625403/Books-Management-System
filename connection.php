<?php
$con=mysqli_connect("localhost","library-user","Dini16254030","librarydb");
if($con){
    echo "Connected successfully!";

}else{
    echo "Connection failed!";
    die("Connection failed".mysqli_connect_error());
      v  

   
}


?>