<!-- DeleteCar.php 
|Student name:Abigail Murray|Student Number:C00260073|Date: March 2024|
Php file for deleting a car from the database
If car is out on rental then they cannot delete the car -->

<?php session_start();
?> 
<br>

<?php 
include 'db.inc.php';

// will need to get carType  from car type table
$carTypeSelected = $_POST['delcarType'];
//Retrieve carType from carType table 
$queryCarType = "SELECT carTypeID from carType WHERE modelName = '$carTypeSelected'"; 
$resultQuery =  mysqli_query($con, $queryCarType);


// Get the car ID to be deleted
$carID = $_POST['delid'];

// Check if the car is out on rental ('unavailable' indicates it's out on rental)
$queryStatus = "SELECT currentStatus FROM car WHERE carID = '$carID' AND currentStatus = 'Unavailable'"; 
$resultStatus = mysqli_query($con, $queryStatus);


// If the car is marked as unavailable, prevent deletion
if(mysqli_num_rows($resultStatus) > 0)
	{
		echo '<script>alert("You cannot delete this car as it is currently out on rental.");</script>';
		//Redirect to the page after not deleting
			echo '<script>window.location = "DeleteCar.html.php";</script>';
	} 
else {
    // If the car is marked as available, proceed with deletion
    $sql = "UPDATE car SET deletedFlag = true WHERE carID = '$carID'";

    if(!mysqli_query($con, $sql)) 
	{
        echo "Error: " . mysqli_error($con);
    } 
	else {
        // Set session variables for deleted car
        $_SESSION["carID"] = $_POST['delid'];
        $_SESSION["registration"] = $_POST['delregistration'];
        $_SESSION["colour"] = $_POST['delcolour'];
        $_SESSION["bodyStyle"] = $_POST['delbodyStyle'];
        $_SESSION["dateAdded"] = $_POST['deldateAdded']; 
        $_SESSION["currentStatus"] = $_POST['delcurrentStatus'];
        $_SESSION["colour"] = $_POST['delcolour'];
        
        mysqli_close($con);/*close connection to the database*/
        
		// Alert to notify the user that the car has been successfully deleted
        echo '<script>alert("The car has been successfully deleted.");</script>';
		
        // Redirect to the page after deletion
        echo '<script>window.location = "DeleteCar.html.php";</script>';
    }
}
?>
