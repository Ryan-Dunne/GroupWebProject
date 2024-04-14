<?php


/*student name: Abigail Murray
student number:C00260073
file used for generating a listbox with fields from database
For allowing user to select a car from a listbox of all cars*/ 


include "db.inc.php" ; //database connection
date_default_timezone_set('UTC');

$sql = "SELECT carID, registration, currentStatus, chassisNumber, doors, price, dateAdded, bodyStyle, colour FROM car where deletedFlag = 0";    //deleted_flag=0 to get all NOT  deleted
if (!$result = mysqli_query($con, $sql))
{
    die ('Error in querying the database' . mysqli_error($con));/*use die instead of echo so it stops */

}


echo "<br> <select name ='amendListbox' id='amendListbox' onclick='populate()'> ";//generates listbox

while($row = mysqli_fetch_array($result))//to fetch all rows in result set
{
    $id = $row['carID'];
    $registration = $row['registration'];
	$status =$row['currentStatus'];
	$chassis=$row['chassisNumber'];
	$doors=$row['doors'];
	$price=$row['price'];
	$date = date_create($row['dateAdded']);
    $date= date_format($date,"Y-m-d");
	$bodyStyle = $row['bodyStyle'];
	$colour=$row['colour'];
    $allText = "$id,$registration,$status,$chassis,$doors,$price,$date,$bodyStyle,$colour ";
    echo "<option value= '$allText' > $registration</option>";
}
echo "</select>";
mysqli_close($con);//closing connection to database

?>