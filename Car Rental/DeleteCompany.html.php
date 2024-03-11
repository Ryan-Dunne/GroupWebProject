<!--HTML SHEET FOR ADDING A COMPANY-->
<!DOCTYPE html>
<html lang="en">
<?php
include 'db.inc';
session_start(); 
?>
<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="AddCompany.css">
    <script src="AddCompany.js"></script>
    <title>Delete A Company </title>
</head>

<body class="background">
    <!--HEADER-->
    <div class="header">
        <h1>Delete A Company</h1>
            <img class="help-button" alt="help-button" src="helpbutton.png" onclick="helpMenu()">
        </a>
        <img class="logo" alt="logo" src="godrivelogo.png">
    </div>
    <!--NAVIGATION BAR -->
    <div class="navbar">
        <a href="home.html">Home Page</a>
        <a href="#login">Login</a>

        <div class="dropdown">
            <button class="dropbtn">Rentals
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Returns
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Accept Payments
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Blacklist Menu
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Reports Menu
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">File Maintenance Menu
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <div class="dropdown">
            <button class="dropbtn">Set-Up
                <img class="arrow" src="arrow.png">
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div><!--close dropdown-content-->
        </div><!--close dropdown-->

        <a href="#exit">Exit <img class="exit-icon" src="exit_icon.png" alt="Exit icon"></a>
    </div><!--close navbar-->


<!---------------------------------------------------------------------------------------------------------------->

<?php include 'listbox.php'; ?>  <!--Includes listbox file -->
<script>
function populate()  //Populates Text fields
{
    var sel = document.getElementById("listbox"); //Selects listbox
    var result;
    result = sel.options[sel.selectedIndex].value; //Result equals value at selected index
    var personDetails = result.split('`'); //Splits result by , into different indexes in personDetails
    document.getElementById("display").innerHTML = "The details of the person selected: " + result;
    document.getElementById("amendid").value = personDetails[0];
    document.getElementById("amendfirstname").value = personDetails[1]; //populates fields with values at personDetails index
    document.getElementById("amendlastname").value = personDetails[2];
    document.getElementById("amendDOB").value = personDetails[3];
}
</script>

<p id ="display"> </p>

<form name = "myForm" action="AmendView.php" onsubmit="return confirmCheck()" method ="post">  <!--Calls confirmCheck() & Sends values to AmendView.php if true -->

    <label for="amendid">Person ID</label>
    <input type="text" name="amendid" id="amendid" disabled>
    <label for="amendfirstname">First Name</label>
    <input type="text" name="amendfirstname" id="amendfirstname" disabled>       <!--Defaults all input fields as disabled -->
    <label for="amendlastname">Last Name</label>
    <input type="text" name="amendlastname" id="amendlastname" disabled>
    <label for= "amendDOB">Date Of Birth</label>
    <input type="date" name="amendDOB" id="amendDOB" title="format is dd-mm-yyyy" disabled>
    <br><br>

    <input type="submit" value="Save Changes">
</form>
</body>
</html>