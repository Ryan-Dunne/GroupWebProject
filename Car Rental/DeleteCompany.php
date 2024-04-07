<?php
include 'db.inc.php';
include 'DeleteCompany.html.php';
session_start();
date_default_timezone_set("UTC");

$_SESSION['companyName'] = $_POST['companyName'];
$_SESSION['companyAddress'] = $_POST['companyAddress'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['companyWeb'] = $_POST['companyWeb'];
$_SESSION['companyEmail'] = $_POST['companyEmail'];
$_SESSION['credit'] = $_POST['credit'];
$_SESSION['amountOwed'] = $_POST['amountOwed'];
$_SESSION['blacklistFlag'] = $_POST['blacklistFlag'];
$_SESSION['noOfBlacklists'] = $_POST['noOfBlacklists'];

$sql = "UPDATE company SET DeleteFlag = 1 WHERE CompanyName = '$_SESSION[companyName]'" ;


if (!mysqli_query($con,$sql))
{
    die ("An Error in the SQL Query: " . mysqli_error($con) );
}


Session_unset();
mysqli_close($con);




?>
