<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       01/03/2024
    Purpose:    Create a listbox
-->
<?php
include "db.inc.php";   //Includes DB Connection
date_default_timezone_set('UTC');   //Sets timezone

$sql = "SELECT car.carID, car.registration, carType.modelName, carType.version, carType.fuelType,
        car.colour, car.bodyStyle, car.doors
        FROM car
        INNER JOIN carType ON car.carTypeID = carType.carTypeID
        WHERE car.currentStatus = 'Available'";    //SQL Statement

if (!$result = mysqli_query($con, $sql))    //If Con & sql doesnt not return results...
{
    die('Error in querying the database' . mysqli_error($con)); //Show Error
}



echo "<table name = 'carTable' id = 'carTable'>"; //Start of Listbox
echo "<th>ID</th><th>Reg</th>";
while ($row = mysqli_fetch_array($result))  //While row can fetch another result
{
    $id = $row['carID'];
    $carReg = $row['registration'];
    $modelName = $row['modelName']; //Populates variables with the appropriate values from the row
    $version = $row['version'];
    $fuelType = $row['fuelType'];
    $colour = $row['colour'];
    $bodyStyle = $row['bodyStyle'];
    $doors = $row['doors'];
    echo "<tr><td>$id <td>$carReg</td></td></tr>"; //Shows the first  & last name values in listbox}
}
echo "</table>";


if(isset($_POST["chooseCar"]))
{
$_SESSION['carID'] = $_POST['carID'];
echo $_SESSION['carID'];
}
?>
    <br><br>
    <form>
    <input type="text" id ="carID">
    <label for="carID">Selected Car</label>
    <input type="text" id ="carReg">
    <input type="submit" value="Choose Car" id="chooseCompany" name="chooseCompany" onclick="submitFields()">
    <form>
    <br><br>