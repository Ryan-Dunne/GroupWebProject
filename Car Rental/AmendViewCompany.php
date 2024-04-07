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
/*else
{
    if(mysqli_affected_rows($con) != 0) //If a row was affected...
    {
        echo mysqli_affected_rows($con)." record(s) updated <br>";  //Echo rows updated
        echo "Person ID " . $_POST['id'] . ", " . $_POST['name'] . ", " . $_POST['address']. ", " . $_POST['phone']. ", " . $_POST['gpa']. ", " . 
                            $_POST['dob']. ", " . $_POST['yearbegan']. ", " . $_POST['coursecode'] . " Has Been Updated!";
    }
    else
    {
        echo "No Records were changed";
    }
}*/
mysqli_close($con);
?>