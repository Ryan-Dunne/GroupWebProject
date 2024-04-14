<?php
/*when confirmed, stay on page with message "a record has been added"*/
/*fix the price*/
/* 
inserCar.php 
php file which connects to database and carries out queries
generates cartype listbox, calculates new carid,inserts new car into database
student name: Abigail Murray
student number:C00260073
*/

//1: connect to database
include "db.inc.php";/*allows us to connect + checks connection */
 date_default_timezone_set('UTC');


//2: Check if the connection was successful
if (!$con)
{
    die("Connection failed: " . mysqli_connect_error());//using die so it will stop if connection fails
}

//4: Assign values to variables
$reg = $_POST['registration'];
$chassis = $_POST['chassis'];
$doors = $_POST['doors'];
$price = $_POST['price']; 
$colour = $_POST['colour'];
$body = $_POST['bodyStyle'];
$dateAdded = $_POST['dateAdded'];

//5:calculate new carid
$queryMaxCarID ="SELECT max(carID) as maxID FROM car";
$resultMaxCarID = mysqli_query($con, $queryMaxCarID);
$row = mysqli_fetch_assoc($resultMaxCarID);
$newCarID = $row['maxID'] + 1;

//6:Get carTypeID fk
// Retrieve the carTypeID based on the selected car type
$selectedCarType = $_POST['carType']; 

// Query to retrieve the carTypeID from the carType table
$queryCarType = "SELECT carTypeID FROM carType WHERE modelName = '$selectedCarType'";
$resultCarType = mysqli_query($con, $queryCarType);

// Assuming the query is successful and returns a single row
if ($resultCarType) 
{
    $rowCarType = mysqli_fetch_assoc($resultCarType);
    $carTypeID = $rowCarType['carTypeID'];

    // Construct the SQL query with the retrieved carTypeID
    $sql = "INSERT INTO car (registration, chassisNumber, doors, price, colour, bodyStyle, dateAdded, cumulativeRentals, 		       currentStatus, carID, carTypeID) VALUES ('$reg', '$chassis', '$doors', '$price', '$colour', '$body', '$dateAdded', 0,'available', $newCarID, $carTypeID)";

    // Execute the SQL query for adding a new car
    if (mysqli_query($con, $sql)) 
	{
        echo "<br>A Record has been added for " . $reg;
    } else 
	{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
} 
else 
	{
		echo "Error: Unable to retrieve carTypeID";
	}

// Close the database connection
mysqli_close($con);



/*
//3: Output the details sent, helps with error checking
echo "The details sent down are: <br>";
//echo "car id is: " . $_POST['carID'] . "<br>";
echo "Registration is: " . $_POST['registration'] . "<br>";
echo "Chassis Number is: " . $_POST['chassis']  . "<br>";
echo "Number of doors: " . $_POST['doors'] . "<br>";
echo "Purchase Price is: " . $_POST['price'] . "<br>";  
echo "Colour is: " . $_POST['colour'] . "<br>";  
echo "Body Style is: " . $_POST['bodyStyle'] . "<br>";   
echo "Date Added to fleet is: " . $_POST['dateAdded'] . "<br>";  
echo "Car Type is: " . $_POST['carType'] . "<br>"; 
*/