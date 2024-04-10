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
</head>

<body class="background">
    <!--HEADER-->
    <div class="header">
        <h1>Delete A Company</h1>
            <img class="help-button" alt="help-button" src="images/helpbutton.png" onclick="helpMenu()">
        </a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>
    <!--NAVIGATION BAR -->
    <div class="navbar">
        <a href="home.html">Home Page</a>
        <a href="#login">Login</a>

        <div class="dropdown">
            <button class="dropbtn">Rentals
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Returns
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Accept Payments
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Blacklist Menu
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Reports Menu
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">File Maintenance Menu
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="AddCompany.html.php">Add a Company</a>
                <a href="AmendViewCompany.html.php">Amend a Company</a>
                <a href="DeleteCompany.html.php">Delete a Company</a>
                <a href="Rental.html.php">Rentals</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Set-Up
                <img class="arrow" src="images/arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <a href="#exit">Exit <img class="exit-icon" src="images/exit_icon.png" alt="Exit icon"></a>
    </div><!--close navbar-->


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