<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Process POST values & send SQL Statement to DB
-->
<?php
include 'db.inc.php'; //DB Connection
include 'DeleteCompany.html.php'; //Stays on same page when submitted

$_SESSION['companyID'] = $_POST['companyID'];
$_SESSION['companyName'] = $_POST['companyName'];
$_SESSION['companyAddress'] = $_POST['companyAddress'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['companyWeb'] = $_POST['companyWeb'];
$_SESSION['companyEmail'] = $_POST['companyEmail'];         //Sets POST values to SESSION
$_SESSION['credit'] = $_POST['credit'];
$_SESSION['amountOwed'] = $_POST['amountOwed'];
$_SESSION['blacklistFlag'] = $_POST['blacklistFlag'];
$_SESSION['noOfBlacklists'] = $_POST['noOfBlacklists'];

$sql = "UPDATE company SET DeleteFlag = 1 WHERE companyID = '$_SESSION[companyID]'" ; //Statement to set Delete Flag using primary key


if (!mysqli_query($con,$sql)) //If DB update cant be done...
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );  //Display Error
}


Session_unset(); //Unsets Session variables when finished
mysqli_close($con);




?>
