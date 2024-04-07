<!--HTML SHEET FOR ADDING A COMPANY-->
<!DOCTYPE html>
<html lang="en">
<?php
include 'db.inc.php';
session_start(); 
?>
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="DeleteCompany.css">
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

<?php include 'DeleteListbox.php'; ?>  <!--Includes listbox file -->
<script>
    populate();
</script>

<p id ="display"> </p>

<form name = "myForm" class="form" action="DeleteCompany.php" onsubmit= "return canBeDeleted()" method ="post">  <!--Calls confirmCheck() & Sends values to AmendView.php if true -->

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

    <input type="submit" value="Delete Record" id="Delete" name="Delete">
</form>

<?php
                if(isset($_POST['Delete']) && ($_POST['amountOwed'] == 0) && ($_POST['blacklistFlag'] == 'N')) //check if form was submitted
                { 
                    $_SESSION['companyName'] = $_POST['companyName'];

                    echo"<p class=popupmsg>" . $_POST['companyName'] . " has been set for deletion </p>";

                }
                else
                {
                    echo("Ensure the company is NOT blacklisted and doesn't owe any money");
                }
                ?>   
</body>
</html>