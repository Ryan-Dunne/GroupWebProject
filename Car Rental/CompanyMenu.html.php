<!--
    Name:       Ryan Dunne
    Student No: C00263405
    Date:       03/2024
    Purpose:    Allow User to make Rentals
-->

<head>
    <meta charset="utf-8"> <!--specifying character encoding for html docu-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <!-- LINKING CSS Styles sheet-->
    <link rel="stylesheet" href="css/CompanyMenu.css">
    <title>Company Menu </title>
    <h1 class="header">Company Menu</h1>
    <?php include "navbar.html"; ?>
</head>
	
    <!--BOX CONTENT- WHEN USER CLICKS ON WORD IN BOX IT TAKES THEM TO RELATED FORM PAGE-->
    <div class="boxes-container">
        <div class="box" id="box1"><h2><a href="AddCompany.html.php">Add Company</a></h2></div>
        <div class="box" id="box2"><h2><a href="DeleteCompany.html.php">Delete Company</a></h2></div>
        <div class="box" id="box3"><h2><a href="AmendViewCompany.html.php">Amend/View Company</a></h2></div>
    </div>
</html>