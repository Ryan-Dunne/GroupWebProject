<!--
•	Name of screen: AddCar.html.php
•	Purpose of screen:This is the php file which allows the user to enter details to Add a new car
•	connects to myStyle.css for stylesheet
•	|Student name:Abigail Murray|Student Number:C00260073|Date: February 2024|
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--ensures browser interprets text content on your webpage (special characters, symbols,characters from various languages)-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- sets the initial zoom level, webpage is initially 		displayed at its normal size without any zooming. -->
    <!--defining the viewport to control the page's dimensions and scaling for different devices:-->
    <link rel="stylesheet" href="myStyle.css">
    <title>Add Car</title>

</head>

<body>
    <!--HEADER-->
    <div class="header">
        <h1>Car Menu: Add</h1>
        <a href="Help.html"><img class="help-button" alt="help-button" src="images/helpbutton.png"></a>
        <img class="logo" alt="logo" src="images/godrivelogo.png">
    </div>

    <?php include 'menu.php'?> <!-- including the navbar/menu to get to other pages-->

    <!--Form content description
    input which is typed in:registration number, chassis number, number of doors, purchase price date added to fleet (default to 	 systems date)
  	input from presets: can select colour, body style
    input from listbox: can select car type
  	-->

    <div class="column">
        <!-- form fields-->
        <div class="addCar">
            <form id="addCarForm" action="insertCar.php" method="post" onsubmit="return confirmInsert()">
                <h2>Add A Car</h2>

                <div class="form-group">
                    <label for="registration">Registration Number</label>
                    <input type="text" id="registration" name="registration"
                        placeholder="registration number eg. 231-KE-56734"
					    title="Format:2/3 digits - 1/2 uppercase alphabetical characters - 1/6 numerical values. eg, 211-KE-64375"  						pattern="\d{2,3}-[A-Z]{1,2}-\d{1,6}" required>
                </div>
                <!--validation:\d is shorthand pattern for 0-9. Accept 2/3 numeric values,two or one alpha Uppercase,1 or 6 numeric 				-->

                <div class="form-group">
                    <label for="chassis">Chassis Number</label>
                    <input type="text" id="chassis" name="chassis" placeholder="chassis number eg. 123456789ABCDEFT6"
                        title="Chassis number must be 17 alphanumeric characters,alpha characters must be upper(excluding Q, I, O)"
                        pattern="[A-HJ-NPR-Z0-9]{17}" required>
                </div><!--Validation:17 characters, alphanumeric, uppercase alpha characters, excluding I,O,Q-->

                <div class="form-group">
                    <label for="doors">Number of Doors</label>
                    <input type="text" id="doors" name="doors" placeholder="number of doors eg. 4"
                        title="Format: You must enter a numeric digit in the range 1-5" pattern="[1-5]" required>
                </div>
                <!--making number of doors required--><!--validation: must only accept numerical values. min 1, max =5 -->

                <div class="form-group">
                    <label for="price">Purchase Price</label>
                    <input type="number" id="price" name="price" pattern="^[0-9]+\.?[0-9]{0,2}$"
                        placeholder="purchase price eg. 25500.00"
                        title="Format: you must only enter numeric digits or fullstop. eg  25980.98  " required>
                </div><!--VALIDATION: any number of digits followed by optional '.' followed by 0 or 2 digits -->

                <div class="form-group">
                    <label for="dateAdded">Date Added to Fleet</label>
                    <input type="date" id="dateAdded" name="dateAdded" onfocus="setCurrentDate()"
                        onblur="validateDate()">
                    <!--is of type date, insertCar.js has function for setting it to default to system date and also to validate 					the date,past and present is acceptable(but not in the future)-->
                </div>

                <div class="form-group">
                    <!--putting all dropdown inputs together to ensure it looks neater-->
                    <label for="carType">Car Type</label>
                    <select name="carType" id="carType">
                        <!-- Add an empty option as a placeholder -->
                        <option value="" disabled selected>Select Car Type</option>
                        <?php include 'carTypeListbox.php';?><!--this php file generates listbox-->
                    </select>
                </div>

                <div class="form-group">
                    <label for="bodyStyle">Body Style</label>
                    <select name="bodyStyle" id="bodyStyle">
                        <!-- Add an empty option as a placeholder -->
                        <option value="" disabled selected>Select Body Style</option>
                        <option value="saloon">Saloon</option>
                        <option value="pickup">Pickup</option>
                        <option value="suv">Suv</option>
                        <option value="hatchback">Hatchback</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="colour">Colour</label>
                    <select name="colour" id="colour">
                        <!-- Add an empty option as a placeholder -->
                        <option value="" disabled selected>Select a Colour</option>
                        <option value="silver">Silver</option>
                        <option value="black">Black</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="grey">Grey</option>
                        <option value="white">White</option>
                        <option value="red">Red</option>
                        <option value="yellow">Yellow</option>
                        <option value="blueMetallic">Blue Metallic</option>
                        <option value="midnightBlue">Midnight Blue</option>
                        <option value="pearlWhite">Pearl White</option>
                        <option value="crimsonRed">Crimson Red</option>
                        <option value="graphiteGrey">Graphite Grey</option>
                        <option value="deepBlack">Deep Black</option>
                    </select>
                </div><br>

                <div class="button-group">
                    <button type="submit" class="submit-button">Insert Record</button>
                    <!--when pressed they should be prompted with message are you sure you want to submit-->
                    <button type="reset" class="reset-button">Reset
                    </button><!--clear button as user should always have a way to clear what they have done-->
                </div>
            </form>
        </div><!-- close addCarForm-->
    </div><!--close column-->
    <script src="insertCar.js"></script><!--functionality for date and ensuring they want to submit-->
</body>

</html>
