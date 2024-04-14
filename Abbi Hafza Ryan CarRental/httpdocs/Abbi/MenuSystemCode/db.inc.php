<?php 
/*file used for connecting to database*/ 

$hostname ="localhost";/*localhost on own machine*/
$username = "Manager";
$password= "GoDrive123";

$dbname="GoDrive";



$con = mysqli_connect($hostname,$username,$password,$dbname);
if(!$con)
{
    die("Failed to connect to MySQL: ". mysqli_connect_error());/*error checking*/
}

?>