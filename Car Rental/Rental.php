<?php
include 'db.inc.php';
include 'Rental.html.php';
date_default_timezone_set("UTC");



/*$sql = "UPDATE company SET DeleteFlag = 1 WHERE CompanyName = '$_SESSION[companyName]'" ;


if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}
*/

function popUpMsg()
{
    echo"<p class=popupmsg>" . $_SESSION['chosenCompanyID'] . " has been chosen </p>";
}

?>
