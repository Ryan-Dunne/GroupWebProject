<!--
    C00263405
    Ryan Dunne
    1/2/2024
-->

<?php

$hostname = "localhost";    //Name of host
$username = "C00263405";    //Login credentials
$password = "Dovahkiin1";   

$dbname = "MYDBC00263405";  //Database Name

$con = mysqli_connect($hostname,$username,$password,$dbname);//Uses the connect function with all the relevant credentials to open a database connection

if (!$con) //If connection fails...
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); //Print Error
    }


$sql = "Select * from persons WHERE DeletedFlag = 0"; //Selects all from persons table

$result = mysqli_query($con,$sql); //Performs the above query

echo "<br>The persons table contains the following records: <br>";

//Associative Array
while ($row=mysqli_fetch_array($result)) //While then row holds a result...
{
echo $row["personId"] . "  " . $row["firstName"] . " " . $row["lastName"] . "<br>"; //Prints Id, First & Last name  
}

mysqli_close($con); //Closes the connection

?>