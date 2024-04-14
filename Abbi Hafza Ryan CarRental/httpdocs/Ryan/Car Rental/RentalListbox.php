<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       01/03/2024
    Purpose:    Create a listbox
-->

<?php
include "db.inc.php";   //Includes DB Connection
date_default_timezone_set('UTC');   //Sets timezone

$sql = "SELECT CompanyID, CompanyName, Address, AmountOwed, CreditLimit FROM company WHERE BlacklistFlag = 'N'";    //SQL Statement

if (!$result = mysqli_query($con, $sql))    //If Con & sql doesnt not return results...
{
    die('Error in querying the database' . mysqli_error($con)); //Show Error
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //Start of Listbox

while ($row = mysqli_fetch_array($result))  //While row can fetch another result
{
    $id = $row['CompanyID'];
    $companyName = $row['CompanyName']; //Populates variables with the appropriate values from the row
    $companyAddress = $row['Address'];
    $amountOwed = $row['AmountOwed'];
    $creditLimit = $row['CreditLimit'];
    $allText = "$id  $companyName  $companyAddress  $amountOwed  $creditLimit"; //Contains all of the values from the row, seperated by ,
    echo "<option value = '$allText'>$id $companyName</option>"; //Shows the first  & last name values in listbox
}

echo "</select>";




?>
