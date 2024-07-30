<?php 
$host ="localhost";
$user ="root";
$pass ="";
$db ="registrationphp";


$con = mysqli_connect($host,$user,$pass,$db);
if($con){
    // echo "connection established";
}
else{
    echo"connection not established";
}
?>
