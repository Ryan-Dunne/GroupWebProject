<!-- DeleteCar.php 
Php file for deleting a car from the database
PUT IN A CHECK FOR IF THE CAR IS OUT ON RENTAL
If car is out on rental then they cannot delete the car -->

<?php session_start();
?> 
<br><br>

<?php 
include 'db.inc.php';

// will need to get carType  from car type table
$carTypeSelected = $_POST['delcarType'];
//Retrieve carType from carType table 
$queryCarType = "SELECT carTypeID from carType WHERE modelName = '$carTypeSelected'"; 
$resultQuery =  mysqli_query($con, $queryCarType);


/*not fully deleting the entry, just setting the deleted flag to 1/true*/
$sql = "UPDATE car SET deletedFlag = true WHERE carID= '$_POST[delid]'";

if(! mysqli_query($con,$sql))
{
    echo "error" .mysqli_error($con);
}
//set session variables
$_SESSION["carID"] = $_POST['delid'];
$_SESSION["registration"] = $_POST['delregistration'];
$_SESSION["colour"] = $_POST['delcolour'];
$_SESSION["bodyStyle"] = $_POST['delbodyStyle'];
$_SESSION["dateAdded"] = $_POST['deldateAdded']; 
$_SESSION["currentStatus"] = $_POST['delcurrentStatus'];
$_SESSION["colour"] = $_POST['delcolour'];
mysqli_close($con);
//header('Location:Delete.html.php');
//exit();
?>
<script>
    window.location = "DeleteCar.html.php"
</script>