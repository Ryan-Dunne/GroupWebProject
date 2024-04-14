<!--
•	Name of screen: db.inc.php
•	Purpose of screen: This is the php file which connects to the database
•	|Student name:|Student Number:|Date: January 2024|
-->

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