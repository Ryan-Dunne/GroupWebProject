<!-- AmendCar.php 
This file is used to amend the car details
|Student name:Abigail Murray|Student Number:C00260073|Date: February/March 2024|
-->
<?php
// Include database connection file
include 'db.inc.php';
date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amenddate'])); // Format date for database


//////////////////////////////////////////////////
$chassis = $_POST['amendchassis'];
$doors=$_POST['amenddoors'];
$price=$_POST['amendprice'];
$bodyStyle=$_POST['amendstyle'];
$colour=$_POST['amendcolour'];
$registration=$_POST['amendregistration'];

//$registration='231-D-421146';


//////////////////////////////////////////////////

// Retrieve car type selected in the form
$carTypeSelected = $_POST['amendtype'];

// Retrieve carTypeID from carType table based on modelName
$queryCarType = "SELECT carTypeID FROM carType WHERE modelName = '$carTypeSelected'";
$resultCarType = mysqli_query($con, $queryCarType);
	
// Check if car type exists
if ($rowCarType = mysqli_fetch_assoc($resultCarType))
{
    $carTypeID = $rowCarType['carTypeID'];
	
	//$sql = "UPDATE car SET chassisNumber='$_POST[amendchassis]', doors='$_POST[amenddoors]', price='$_POST[amendprice]', //dateAdded='$dbDate', bodyStyle='$_POST[amendstyle]', colour='$_POST[amendcolour]', carTypeID='$carTypeID' WHERE //registration='$_POST[amendregistration]'";

$sql = "UPDATE car SET chassisNumber='$chassis', doors='$doors', price='$price' , dateAdded='$dbDate', bodyStyle='$bodyStyle', colour='$colour', carTypeID='$carTypeID' WHERE registration='$registration'";

//$sql = "UPDATE car SET chassisNumber='400', doors=4, price=2400, dateAdded=$dbDate, bodyStyle='tractor', colour='pink', //carTypeID=$carTypeID WHERE registration='231-D-421146'";
	// Execute SQL query
    if (!mysqli_query($con, $sql)) {
        die ("ERROR " . mysqli_error($con)); // Display error if query fails
    } else {
        if (mysqli_affected_rows($con) != 0) {
            echo "<script>alert('Record has been updated'); window.location.href='AmendCar.html.php';</script>";
        } else {
            echo "<script>alert('No records were changed'); window.location.href='AmendCar.html.php';</script>";
        }
    }
} else {
    echo "<script>alert('Error: car type not found'); window.location.href='AmendCar.html.php';</script>";
}

	
	
	
// Close database connection
mysqli_close($con);
?>
