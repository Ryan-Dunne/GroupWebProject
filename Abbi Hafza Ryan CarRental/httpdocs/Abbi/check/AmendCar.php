<?php

/* amendCar.php
student name: Abigail Murray
student number:C00260073
file used for amend car*/ 
/*/Get carTypeID fk
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
    $sql = "INSERT INTO car (registration, chassisNumber, doors, price, colour, bodyStyle, dateAdded, cumulativeRentals, 		       currentStatus, carID, carTypeID) VALUES ('$reg', '$chassis', '$doors', '$price', '$colour', '$body', '$dateAdded', 0,     'Available', $newCarID, $carTypeID)";

	*/
include 'db.inc.php';
date_default_timezone_set('UTC');
$dbDateAdded = date("Y-m-d", strtotime($_POST['amenddateAdded'])); //TO MATCH DATE FORMAT IN THE DATABASE 
//First will need to get carType 
$carTypeSelected = $_POST['amendCarType'];
//Retrieve carType from carType table 
$queryCarType = "SELECT carTypeID from carType WHERE modelName = '$carTypeSelected'"; 
$resultQuery =  mysqli_query($con, $queryCarType);


//the fields  which the user can amend: colour, car type, chassis number,body style, number of doors, purchase price, date added to fleet
//cannot amend: registration number, current status
$sql = "UPDATE car SET registration = '$_POST[amendregistration]', colour = '$_POST[amendcolour]', bodyStyle= '$_POST[amendbodyStyle]', doors= '$_POST[amenddoors]', price= '$_POST[amendprice]', dateAdded ='$dbDateAdded', currentStatus ='$_POST[amendcurrentStatus]'
WHERE carID ='$_POST[amendcarId]' ";

if (! mysqli_query($con, $sql))//execute query
{
    echo "ERROR " . mysqli_error($con);//fails to execute

}
else //executes 
{
    if (mysqli_affected_rows($con) !=0)//records updated
        {
            echo mysqli_affected_rows($con) . "record(s) updated <br>"; 
            echo "Car Id " . $_POST['amendcarId'] . ",  " . $_POST['amendregistration']
             . " has been updated";
        }
    else //no records updated
        {
            echo "No records were changed";
        }

}

mysqli_close($con);
?>

<form action = "AmendCar.html.php" method ="post" >
    <input type= "submit" value="Return to previous screen">
</form>