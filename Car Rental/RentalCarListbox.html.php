<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       04/2024
    Purpose:    Display Car Table & Rental Dates
-->
<?php
include "db.inc.php";   //Includes DB Connection
date_default_timezone_set('UTC');   //Sets timezone

$sql = "SELECT car.carID, car.registration, carType.modelName, carType.version, carType.fuelType,
        car.colour, car.bodyStyle, car.doors, car.rentalCategory, rentalCategory.costPerDay, rentalCategory.5DayDiscount, rentalCategory.10DayDiscount
        FROM car
        INNER JOIN carType ON car.carTypeID = carType.carTypeID
        INNER JOIN rentalCategory ON car.rentalCategory = rentalCategory.rentalCategoryID
        WHERE car.currentStatus = 'Available'";    //SQL Statement, INNER JOIN on 3 tables
        

if (!$result = mysqli_query($con, $sql))    //If Con & sql doesnt not return results...
{
    die('Error in querying the database' . mysqli_error($con)); //Show Error
}


echo "<h3>Cars Available to Rent</h3>";
echo "<div id='scrollCarTable'><table name = 'carTable' id='carTable' onclick='getDate()'>"; //Start of Listbox
echo "<th>Reg</th><th>Model</th><th>Version</th><th>Fuel Type</th><th>Colour</th><th>Style</th><th>No. Of Doors</th><th>Rental Category</th><th>Cost Per Day</th>";
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
    $rentalCategory = $row['rentalCategory'];
    $costPerDay = $row['costPerDay'];
    $fiveDayDiscount = $row['5DayDiscount'];
    $tenDayDiscount = $row['10DayDiscount'];
    echo "<tr onclick='getSetTableData(this)'><td class='hide'>$id</td><td>$carReg</td><td>$modelName</td><td>$version</td><td>$fuelType</td><td>$colour</td><td>$bodyStyle</td><td>$doors</td><td>$rentalCategory</td><td>$costPerDay</td><td class='hide'>$fiveDayDiscount</td><td class='hide'>$tenDayDiscount</td></tr>"; //Shows the first  & last name values in listbox}
}
echo "</table></div>";
?>

    <br><br>
    <form>
    <input type="hidden" id ="carID" name="carID">  <!--Hidden Form Data for POST method-->
    <input type="hidden" id ="costPerDay" name="costPerDay"> <!--Hidden Form Data for Javascript methods-->
    <input type="hidden" id ="fiveDayDiscount" name="fiveDayDiscount">
    <input type="hidden" id ="tenDayDiscount" name="tenDayDiscount">

    <label for="carReg">Selected Car</label>
    <input type="text" id ="carReg" disabled>

    <label for="currentDate">Current Date</label>
    <input type="date" id ="currentDate" name="currentDate" disabled>
    <br>
    <label for="returnDate">Return Date</label>
    <input type="date" id ="returnDate" name="returnDate" onblur="calculateCost()">
    <br><br>

    <label for="totalCost">Total Cost to Rent</label>
    <input type="text" id ="totalCost" disabled>
    <br><br>
    <input type="submit" value="Choose Car" id="chooseCar" name="chooseCar" onclick="submitFields()">
    <form>
    <br><br>



