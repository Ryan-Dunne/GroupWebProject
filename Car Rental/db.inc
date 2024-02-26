<?php

$hostname = "localhost:3306";
$username = "Manager";
$password = "GoDrive123";

$dbname = "GoDrive";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con)
    {
        die ("Failed to connect to MySQL: " . mysqli_connect_error());
    }




?>