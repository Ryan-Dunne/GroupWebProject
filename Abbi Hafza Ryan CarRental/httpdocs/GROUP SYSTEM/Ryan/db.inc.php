<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       02/2024
    Purpose:    Connect to relevant Database
-->
<?php

$hostname = "localhost:3306";
$username = "Manager";
$password = "GoDrive123";

$dbname = "GoDrive";

$con = mysqli_connect($hostname,$username,$password,$dbname); //Creates a connection to DB

if(!$con) //If connection cant be made...
    {
        die ("Failed to connect to MySQL: " . mysqli_connect_error()); //Output Error
    }




?>