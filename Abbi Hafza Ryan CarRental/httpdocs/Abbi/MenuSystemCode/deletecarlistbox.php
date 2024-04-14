<?php


/*student name: Abigail Murray
student number:C00260073
file used for generating a delete carlistbox with fields from database*/ 


include "db.inc.php" ; //database connection
date_default_timezone_set('UTC');
/*get values for users who are not deleted*/
$sql = "SELECT carID, registration, colour, bodyStyle, doors, dateAdded, currentStatus FROM car WHERE deletedFlag = 0"; //deleted_flag=0 to get all NOT  deleted
if (!$result = mysqli_query($con, $sql))/*error in connecting*/
{
    die ('Error in querying the database' . mysqli_error($con));/*use die instead of echo so it stops */

}

echo "<br> <select name ='deletecarlistbox' id='deletecarlistbox' onclick='populate()'> ";//generates listbox

while($row = mysqli_fetch_array($result))//to fetch all rows in result set
{
    $id = $row['carID'];
    $reg = $row['registration'];
    $colour = $row['colour'];
	$style = $row['bodyStyle'];
	$doors= $row['doors'];
	$dateAdded=$row['dateAdded'];
    $date = date_create($row['dateAdded']);
    $date = date_format($date,"Y-m-d");
	$status =$row['currentStatus'];

    $allText = "$id,$reg,$colour,$style,$doors,$date,$status";/*populates in this order*/
    echo "<option value= '$allText' > $reg </option>";
}
echo "</select>";
mysqli_close($con);//closing connection to database

?>