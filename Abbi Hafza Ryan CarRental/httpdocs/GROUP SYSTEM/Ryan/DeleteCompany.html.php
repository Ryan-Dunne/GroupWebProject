<!--Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Screen to set a Company for Deletion
-->
<!--HTML SHEET FOR DELETING A COMPANY-->
<!DOCTYPE html>
<html lang="en">
<?php
include 'db.inc.php'; //Establish DB connection
session_start(); //Starts session
?>
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="css/DeleteCompany.css">
    <script src="DeleteCompany.js"></script>
    <title>Delete A Company </title>
    <h1 class="header">Delete A Company</h1>
    <?php include "navbar.html"; ?>
</head>


<!---------------------------------------------------------------------------------------------------------------->
<?php include 'DeleteCompanyListbox.php'; ?>  <!--Includes listbox file -->
<script>
    populate(); //Populates the forms fields
</script>

<p id ="display"> </p>

<form name = "myForm" class="form" action="DeleteCompany.php" onsubmit= "return canBeDeleted()" method ="post">  <!--Calls canBeDeleted() & Sends values to DeleteCompany.php if true -->

    <input type="hidden" name="companyID" id="companyID"> <!--Hidden field holds primary key for each record-->

    <label for="companyName">Company Name</label>
    <input type="text" name="companyName" id="companyName" disabled>       <!--Defaults all input fields as disabled -->

    <label for= "companyAddress">Address</label>
    <input type="text" name="companyAddress" id="companyAddress" disabled>

    <label for= "phone">Phone Number</label>
    <input type="tel" name="phone" id="phone" disabled>

    <label for= "companyWeb">Web Address</label>
    <input type="text" name="companyWeb" id="companyWeb" disabled>

    <label for="companyEmail">Email Address</label>
    <input type="text" name="companyEmail" id="companyEmail" disabled>

    <label for="credit">Credit Limit</label>
    <input type="text" name="credit" id="credit" disabled>

    <label for="amountOwed">Amount Owed</label>
    <input type="text" name="amountOwed" id="amountOwed" disabled>

    <label for="blacklistFlag">Blacklist Flag</label>
    <input type="text" name="blacklistFlag" id="blacklistFlag" disabled>

    <label for="noOfBlacklists">No. Of Previous Blacklists</label>
    <input type="text" name="noOfBlacklists" id="noOfBlacklists" disabled>

    <br><br>

    <div class="centerButton">
    <input type="submit" value="Delete Record" id="Delete" name="Delete">
</div>
</form>
<?php
                if(isset($_POST['Delete']) && ($_POST['amountOwed'] == 0) && ($_POST['blacklistFlag'] == 'N')) //checks if delete was clicked & Company can be deleted
                { 
                    echo"<p class=popupmsg>" . $_POST['companyName'] . " has been set for deletion </p>"; //Alerts USer company has been set for deletion
                }
                ?>   
</body>
</html>