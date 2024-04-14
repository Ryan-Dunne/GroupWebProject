<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       01/03/2024
    Purpose:    
-->
<?php
include 'db.inc.php';   //Includes DB Connection
include 'AmendViewCompany.html.php';
//SQL statement to update & values in persons table (excluding id) with values input from form
$sql = "UPDATE company SET CompanyName = '$_POST[companyName]', Address = '$_POST[address]', Telephone = '$_POST[phone]',
        WebAddress = '$_POST[webAddress]', EmailAddress = '$_POST[email]', CreditLimit = '$_POST[creditLimit]'
        WHERE CompanyID = '$_POST[companyID]'" ;      


if(!mysqli_query($con,$sql))    //If Query returns false..
{
    echo "ERROR".mysqli_error($con); //Echo Error
}
else
{
        echo "<p class='popupmsg'>A record has been updated for " . $_POST['companyName'] . "</p>";  //Echo Record updated
}
mysqli_close($con);
?>